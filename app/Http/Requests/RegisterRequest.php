<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => [
                'required',
                'confirmation',
                PasswordRule::min(8)->letters()->symbols()->numbers()
            ],
        ];
    }

    public function messages()
    {
       /*  return [
            'name.required' => ['El Nombre es obligatorio'],
            'email.required' => ['El Email es obligatorio'],
            'email.email' => ['El email no es valido'],
            'password' => ['El passqoe'],
        ]; */
    }
}
