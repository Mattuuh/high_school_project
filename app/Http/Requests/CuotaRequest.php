<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuotaRequest extends FormRequest
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
            'mes' => 'required|string',
            'monto' => 'required|numeric|min:26000',
            'interes' => 'required|numeric|max:150.00',
        ];
    }
    public function messages(): array
    {
        return [
            'mes.required' => 'El mes es requerido',
            'mes.string' => 'El mes tiene que ser texto',
            'monto.required' => 'El monto es requerido',
            'monto.numeric' => 'El monto tiene que ser un numero',
            'monto.min' => 'El monto no puede ser menor a 26000',
            'interes.required' => 'El interes es requerido',
            'interes.max' => 'El interes no puede superar 150',
        ];
    }
}
