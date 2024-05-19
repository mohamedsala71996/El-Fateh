<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Update authorization logic based on your application's requirements
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'en_title' => 'required|string|max:255',
            'ar_title' => 'required|string|max:255',
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
            'image' => ['required', 'mimes:png,jpg,jpeg'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'en_title.required' => 'Title field is required.',
            'ar_title.required' => 'حقل مطلوب.',
            'en_content.required' => 'Content field is required.',
            'ar_content.required' => 'حقل مطلوب.',
            'image.required' => 'حقل مطلوب.',
        ];
    }
}
