<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_emp',
        'apellido_emp',
        'dni_emp',
        'domicilio_emp',
        'telefono_emp',
        'email_emp',
        'fecha_ingreso_emp',
        'fecha_egreso_emp',
        'tipo_emp',
    ];
}