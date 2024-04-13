<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|unique:companies|max:80',
            'email' => 'nullable|email|max:320',
            'logo' => 'nullable|file|mimes:jpg,png,svg|max:'.config('app.max_logo_size', 2048),
            'website' => 'nullable|string|max:100',
        ];
    }
}
