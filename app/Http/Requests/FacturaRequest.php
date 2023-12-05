<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaRequest extends FormRequest
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
            'id_caja' => 'numeric',
            'id_alumno' => 'required|numeric',
            'id_forma_pago' => 'required',
            'id_cuota' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'id_caja.required' => 'La caja es requerido',
            'id_alumno.required' => 'El dni de alumno es requerido',
            'id_alumno.numeric' => 'El dni tiene que ser numeros',
            'id_forma_pago.required' => 'Se require una forma de pago',
            'id_cuota.required' => 'Se require una cuota',
        ];
    }
}
