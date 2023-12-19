<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:50|min:3',
            'apellido' => 'required|string|max:100|min:3',
            'dni' => 'required|numeric|min:7|unique:alumnos,dni',
            'domicilio' => 'sometimes|max:50',
            'telefono' => 'sometimes|nullable|min:9',
            'email' => 'sometimes|nullable|email',
            'id_curso' => 'numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre tiene que ser texto',
            'nombre.max' => 'El nombre tiene un maximo de 50 caracteres',
            'nombre.min' => 'El nombre tiene un minimo de 3 caracteres',
            'apellido.required' => 'El apellido es requerido',
            'apellido.string' => 'El apellido tiene que ser texto',
            'apellido.max' => 'El apellido tiene un maximo de 100 caracteres',
            'apellido.min' => 'El apellido tiene un minimo de 3 caracteres',
            'dni.required' => 'El dni es requerido',
            'domicilio.max' => 'El domicilio tiene un maximo de 50 caracteres',
            'telefono.numeric' => 'El telefono tiene que ser numeros',
            'telefono.min' => 'El telefono tiene que tener un minimo de 9 caracteres',
            'email.email' => 'El email tiene que estar en un formato correcto',
            'id_curso.numeric' => 'El curso tiene que estar seleccionado'
        ];
    }
}
