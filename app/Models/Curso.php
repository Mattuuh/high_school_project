<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'cupos',          
        'disponibilidad',                       
        'anio_lectivo',
        'id_horario',    
    ];

    public function periodo_lectivo() {
        return $this->belongsTo(Periodos_lectivo::class,'anio_lectivo');
    }
    public function horario() {
        return $this->belongsTo(Horario::class,'id_horario');
    }
    public function alumnos() {
        return $this->hasMany(Alumno::class,'id_curso');
    }
}
