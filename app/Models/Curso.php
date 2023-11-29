<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'cupos',          
        'disponibilidad',                       
        'anio_lectivo',       
        'grado',
        'division',    
    ];

    public function periodo_lectivo() {
        return $this->belongsTo(Periodos_lectivo::class,'anio_lectivo');
    }
    public function horarios()
    {
        return $this->hasMany(Horario::class,'curso');
    }
   
    public function alumnos() {
        return $this->hasMany(Alumno::class,'id_curso');
    }


}
