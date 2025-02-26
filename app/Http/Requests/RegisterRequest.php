<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name"=> "required",
            "email"=> "required|email",
            "password"=> [
                "required",
                "min:8",
                "regex:/[a-z]/",
                "regex:/[A-Z]/",
                "regex:/[0-9]/" ],
            "confirm_password"=> "required|same:password"
            ];
    }

    public function messages(): array{
        return [
            "name.required"=> "Név megadása kötelező",
        ];
    }
}
