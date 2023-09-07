<?php

namespace App\Http\Requests\Houses;

use Illuminate\Foundation\Http\FormRequest;

class HouseStoreRequest extends FormRequest
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
            'number_rooms' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'description' => ['string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo :attribute es obligatorio',
            'name.numeric' => 'El campo del :attribute debe ser un número.',
            'number_rooms.required' => 'El campo :attribute es obligatorio',
            'number_rooms.numeric' => 'El campo del :attribute debe ser un número.',
            'price.required' => 'El campo :attribute es obligatorio',
            'price.numeric' => 'El campo del :attribute debe ser un número.',
            'description.string' => 'El campo :attribute debe ser una cadena.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'number_rooms' => 'número de habitaciones',
            'description' => 'descripción',
        ];
    }
}
