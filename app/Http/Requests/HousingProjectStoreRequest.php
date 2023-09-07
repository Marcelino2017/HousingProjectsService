<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HousingProjectStoreRequest extends FormRequest
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
            'name' =>  ['required', 'string'],
            'description' =>  ['required', 'string'],
            'payment_number' =>  ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo :attribute es obligatorio',
            'name.string' => 'El campo :attribute debe ser una cadena.',
            'description.required' => 'El campo :attribute es obligatorio',
            'description.string' => 'El campo :attribute debe ser una cadena.',
            'payment_number.required' => 'El campo:attribute es obligatorio',
            'payment_number.numeric' => 'El campo del :attribute debe ser un número.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'description' => 'descripción',
            'payment_number' => 'número de pago',
        ];
    }
}
