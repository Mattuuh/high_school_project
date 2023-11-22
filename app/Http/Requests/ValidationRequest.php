<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'dni' => 'required|numeric|min:7',
            'domicilio' => 'max:50',
            'telefono' => 'numeric|min:10',
            'email' => 'email',
            'imagen' => 'image|mimes:jpeg,png,jpg',
            'tipo_emp' => 'numeric',
            'monto_inicial' => 'numeric',
            'monto_cierre' => 'numeric',
            'legajo_emp' => 'numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'apellido.required' => 'El apellido es requerido',
            'imagen.image' => 'Coloque un formato correcto',
        ];
    }
}
