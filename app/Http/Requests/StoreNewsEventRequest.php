<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules.
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'in:News,Event,Achievement',
            ],

            'date' => [
                'required',
                'date',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'content' => [
                'required',
                'string',
            ],

            'is_published' => [
                'nullable',
                'boolean',
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Title is required.',

            'category.required' => 'Please select a category.',

            'category.in' => 'Invalid category selected.',

            'date.required' => 'Date is required.',

            'date.date' => 'Please enter a valid date.',

            'image.image' => 'The uploaded file must be an image.',

            'image.mimes' => 'Image must be JPG, PNG, or WebP.',

            'image.max' => 'Image size must not exceed 2MB.',

            'content.required' => 'Content is required.',
        ];
    }
}