<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estados_asistencia extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'descripcion_ea',
    ];
    public function asistencia_alumno() {
        return $this->hasMany(Asistencia_alumno::class,'id_estado');
    }
}
