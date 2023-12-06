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
            'nombre' => 'string|max:50',
            'apellido' => 'string|max:100',
            'dni' => 'numeric|min:7',
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
            'dni.required' => 'El dni es requerido',
            'telefono.numeric' => 'El telefono tiene que ser numeros',
            'email.email' => 'El email tiene que estar en un formato correcto',
        ];
    }
}
