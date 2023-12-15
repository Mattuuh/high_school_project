<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'docente',
        'materia',
        'hora_clase',
        'curso',
        'id_dia',
    ];

    public function registroacademico(){
        return $this->hasMany(RegistroAcademico::class,'asignatura');
    }

    // Relación muchos a uno con Empleado (Docente)
    public function empleados()
    {
        return $this->belongsTo(Empleado::class,'docente');
    }

    // Relación muchos a uno con Materia
    public function materias()
    {
        return $this->belongsTo(Materia::class,'materia');
    }

    // Relación muchos a uno con Modulo
    public function horas()
    {
        return $this->belongsTo(Hora::class,'hora_clase');
    }

    // Relación muchos a uno con Curso
    public function cursos()
    {
        return $this->belongsTo(Curso::class,'curso');
    }
    public function dias()
    {
        return $this->belongsTo(Dia::class,'id_dia');
    }
}
