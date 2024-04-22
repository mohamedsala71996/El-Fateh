<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'detailed_address' => 'required|string',
            'description' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'name.required' => 'Please provide a name.',
            'phone_number.required' => 'Please provide a phone number.',
            'governorate.required' => 'Please provide a governorate.',
            'city.required' => 'Please provide a city.',
            'detailed_address.required' => 'Please provide a detailed address.',
            'description.required' => 'Please provide a description.',
        ];
    }
}
