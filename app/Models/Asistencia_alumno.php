<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia_alumno extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'legajo_alu',
        'fecha',
        'id_estado'
    ];

    protected $primaryKey = ['legajo_alu', 'fecha'];

    public function alumnos() {
        return $this->belongsTo(Alumno::class,'legajo_alu');
    }
    public function estados_asistencia() {
        return $this->belongsTo(Estados_asistencia::class,'id_estado');
    }
}
