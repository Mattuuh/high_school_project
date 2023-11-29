<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia_alumno extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $primaryKey = ['legajo_alu', 'fecha'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'legajo_alu');
    }

    public function estadoAsistencia()
    {
        return $this->belongsTo(Estados_asistencia::class, 'id_estado');
    }
}
