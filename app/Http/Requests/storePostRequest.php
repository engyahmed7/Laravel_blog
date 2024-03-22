<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePostRequest extends FormRequest
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
            "title" => ['required', 'string',"min:5"],
            "body" => ['required', 'string'],
            "enable" => [''],
            "published_at" => ['required', 'date']

        ];
    }

    public function messages()
    {
        return [
            'published_at.required' => 'Date field is required.',
            'published_at.date' => 'Date field must be a date.'
        ];
    }
}
