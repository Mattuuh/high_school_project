<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_alu',
            'apellido_alu',
            'dni_alu',
            'domicilio_alu',
            'telefono_alu',
            'email_alu',
            'fecha_inscrip_alu',        
            'id_curso',  
    ];
}
