<?php

namespace App\Http\Requests\Payments;

use Illuminate\Foundation\Http\FormRequest;

class PaymentProjectStoreRequest extends FormRequest
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
            'housing_project_id' => ['required', 'numeric', 'exists:housing_projects,id'],
            'amount' => ['required', 'numeric'],
            'payment_date' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'housing_project_id.required' => 'El campo :attribute es obligatorio',
            'housing_project_id.exists' => 'El :attribute seleccionada no es válido.',
            'housing_project_id.numeric' => 'El campo del :attribute debe ser un número.',
            'amount.required' => 'El campo :attribute es obligatorio',
            'amount.numeric' => 'El campo del :attribute debe ser un número.',
            'payment_date.required' => 'El campo :attribute es obligatorio',
            'payment_date.date' => 'El campo de :attribute debe ser una fecha válida.',
        ];
    }

    public function attributes()
    {
        return [
            'housing_project_id' => 'Id del proyecto de vivienda',
            'amount' => 'monto',
            'payment_date' => 'fecha de pago',
        ];
    }
}
