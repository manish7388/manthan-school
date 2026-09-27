<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'parent_name' => [
                'required',
                'string',
                'max:100',
            ],

            'student_name' => [
                'required',
                'string',
                'max:100',
            ],

            'class_applying_for' => [
                'required',
                'string',
                'max:50',
            ],

            'mobile' => [
                'required',
                'digits:10',
                'regex:/^[6-9][0-9]{9}$/',
            ],

            'email' => [
                'nullable',
                'email',
                'max:150',
            ],

            'message' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'parent_name.required' =>
                'Parent name is required.',

            'student_name.required' =>
                'Student name is required.',

            'class_applying_for.required' =>
                'Please select the class applying for.',

            'mobile.required' =>
                'Mobile number is required.',

            'mobile.digits' =>
                'Mobile number must be exactly 10 digits.',

            'mobile.regex' =>
                'Please enter a valid Indian mobile number.',

            'email.email' =>
                'Please enter a valid email address.',
        ];
    }
}