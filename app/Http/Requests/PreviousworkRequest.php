<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreviousworkRequest extends FormRequest
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
            'image'=>"nullable|array",
            'image.*'=>"nullable|image|mimes:png,jpg",
            'en_engineer'=>"required|string|max:255",
            'ar_engineer'=>"required|string|max:255",
            'en_title'=>"required|string|max:255",
            'ar_title'=>"required|string|max:255",
            'starts_at'=>"required|date_format:Y-m",
            'ended_at'=>"required|date_format:Y-m",
            'en_description'=>"required|string|max:255",
            'ar_description'=>"required|string|max:255",
            'category_id'=>"required|exists:categories,category_id"
        ];
    }
}
