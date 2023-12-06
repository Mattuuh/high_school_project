<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'domicilio',
        'telefono',
        'email',
        'habilitado',     
        'id_curso',
    ];
    // factura -> detalle -> cuota
    public function curso() {
        return $this->belongsTo(Curso::class,'id_curso');
    }
    public function registrosacademicos(){
        return $this->hasMany(RegistroAcademico::class,'legajo_alum');
    }
}
