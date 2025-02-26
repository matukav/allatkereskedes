<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Validator;

class LoginRequest extends FormRequest
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
            "email"=> "required|email",
            "password"=> "required",
        ];
    }

    public function messages(): array{
        return [
            "email.required"=> "E-mail cím kötelező",
            "email.email"=> "E-mail cím kötelező",
            "password.required"=> "Jelszó kötelező",
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            "success" => false,
            "message" => "Beviteli hiba",
            "data" => $validator->errors() 
        ]));
    }
}
