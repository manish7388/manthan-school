<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquiryRequest;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EnquiryController extends Controller
{
    public function create()
    {
        return view('frontend.enquiries.form');
    }

    public function store(StoreEnquiryRequest $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Duplicate Enquiry Check
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'parent_name' => ['required', 'string', 'max:100'],
            'student_name' => ['required', 'string', 'max:100'],
            'class_applying_for' => ['required', 'string', 'max:50'],
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9][0-9]{9}$/'],
            'email' => ['nullable', 'email', 'max:150'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        $existingEnquiry = Enquiry::query()
            ->where('mobile', $request->mobile)
            ->where('class_applying_for', $request->class_applying_for)
            ->where('created_at', '>=', now()->subHours(24))
            ->exists();

        if ($existingEnquiry) {
            return response()->json([
                'success' => false,
                'message' => 'We have already received your enquiry.',
            ], 422);
        }


        /*
        |--------------------------------------------------------------------------
        | Save Enquiry
        |--------------------------------------------------------------------------
        */

        $enquiry = Enquiry::create([
            'parent_name' => $request->parent_name,
            'student_name' => $request->student_name,
            'class_applying_for' => $request->class_applying_for,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 'New',
            'crm_status' => 'Pending',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Send Enquiry To CRM
        |--------------------------------------------------------------------------
        */

        $crmWebhookUrl = config('services.crm.webhook_url');

        if (!$crmWebhookUrl) {

            $enquiry->update([
                'crm_status' => 'Failed',
                'crm_response' => 'CRM webhook URL is not configured.',
            ]);

            Log::warning('CRM webhook URL is not configured.', [
                'enquiry_id' => $enquiry->id,
            ]);

        } else {

            try {

                $response = Http::timeout(5)
                    ->acceptJson()
                    ->post($crmWebhookUrl, [
                        'parent_name' => $enquiry->parent_name,
                        'student_name' => $enquiry->student_name,
                        'class_applying_for' => $enquiry->class_applying_for,
                        'mobile' => $enquiry->mobile,
                        'email' => $enquiry->email,
                        'message' => $enquiry->message,
                    ]);


                if ($response->successful()) {

                    $enquiry->update([
                        'crm_status' => 'Sent',
                        'crm_response' => $response->body(),
                    ]);

                } else {

                    $enquiry->update([
                        'crm_status' => 'Failed',
                        'crm_response' => $response->body(),
                    ]);

                    Log::error('CRM webhook request failed.', [
                        'enquiry_id' => $enquiry->id,
                        'status' => $response->status(),
                        'response' => $response->body(),
                    ]);
                }

            } catch (\Throwable $exception) {

                $enquiry->update([
                    'crm_status' => 'Failed',
                    'crm_response' => $exception->getMessage(),
                ]);

                Log::error('CRM webhook exception.', [
                    'enquiry_id' => $enquiry->id,
                    'message' => $exception->getMessage(),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Return Success
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted successfully.',
            'data' => [
                'id' => $enquiry->id,
                'crm_status' => $enquiry->crm_status,
            ],
        ], 201);
    }
}