<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'en_name' => 'required|string|max:255',
            'ar_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'en_message' => 'required|string',
            'ar_message' => 'required|string',
            'contact_email' => 'required|email',
            'en_terms_conditions' => 'required|string',
            'ar_terms_conditions' => 'required|string', 

        ];
    }
}