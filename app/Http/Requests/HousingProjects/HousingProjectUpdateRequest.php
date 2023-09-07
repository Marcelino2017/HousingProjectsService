<?php

namespace App\Http\Requests\HousingProjects;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HousingProjectUpdateRequest extends FormRequest
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
            'house_id' =>  ['required', 'numeric', 'exists:houses,id',
                Rule::unique('housing_projects', 'house_id')->ignore($this->house_id, 'house_id')
            ],
            'user_id' =>  ['required', 'numeric', 'exists:users,id'],
            'payment_number' =>  ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'house_id.required' => 'El campo :attribute es obligatorio',
            'house_id.unique' => 'El :attribute ya ha sido tomado.',
            'house_id.exists' => 'El :attribute seleccionada no es válido.',
            'house_id.numeric' => 'El campo del :attribute debe ser un número.',
            'user_id.required' => 'El campo :attribute es obligatorio',
            'user_id.exists' => 'El :attribute seleccionada no es válido.',
            'user_id.numeric' => 'El campo del :attribute debe ser un número.',
            'payment_number.required' => 'El campo:attribute es obligatorio',
            'payment_number.numeric' => 'El campo del :attribute debe ser un número.',
        ];
    }

    public function attributes()
    {
        return [
            'house_id' => 'Id de la casa',
            'user_id' => 'Id del usuario',
            'payment_number' => 'número de pago',
        ];
    }
}
