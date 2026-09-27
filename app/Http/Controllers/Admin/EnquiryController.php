<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display enquiries.
     */
    public function index(Request $request)
    {
        $query = Enquiry::query()
            ->orderByDesc('created_at');

        /*
        |--------------------------------------------------------------------------
        | Filter by status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $enquiries = $query
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.enquiries.index',
            compact('enquiries')
        );
    }

    /**
     * Update enquiry status through AJAX.
     */
    public function updateStatus(Request $request, Enquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:New,Contacted,Closed',
            ],
        ]);

        $enquiry->update([
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Enquiry status updated successfully.',
            'status' => $enquiry->status,
        ]);
    }
}