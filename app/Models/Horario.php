<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = [
        'docente',
        'materia',
        'hora',
        'curso', 
    ];

    // Relación muchos a uno con Empleado (Docente)
    public function mi_empleado()
    {
        return $this->belongsTo(Empleado::class,'docente','legajo_emp');
    }

    // Relación muchos a uno con Materia
    public function mi_materia()
    {
        return $this->belongsTo(Materia::class,'materia');
    }

    // Relación muchos a uno con Modulo
    public function hora()
    {
        return $this->belongsTo(Hora::class);
    }

    // Relación muchos a uno con Curso
    public function mi_curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
