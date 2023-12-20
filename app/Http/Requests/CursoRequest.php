<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'nombre' => 'required|numeric',
            'division' => 'required|string|max:1',
            'cupos' => 'required|numeric|max:40',
            'disponibilidad' => 'required|numeric|max:40',
            'anio_lectivo' => 'required|numeric'
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El curso es requerido',
            'nombre.numeric' => 'El curso tiene que ser numero',
            'division.required' => 'El division es requerido',
            'division.string' => 'El division tiene que ser texto',
            'division.max' => 'El division tiene que ser un caracter',
            'cupos.required' => 'El interes es requerido',
            'cupos.numeric' => 'El cupo tiene que ser numero',
            'cupos.max' => 'El cupo tiene que ser menor a 40',
            'anio_lectivo.required' => 'El año lectivo es requerido',
            'anio_lectivo.numeric' => 'El año lectivo tiene que estar seleccionado',
        ];
    }
}
