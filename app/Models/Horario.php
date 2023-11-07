<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'fecha_alta_hor',
        'horario_hor',
    ];

    public function cursos() {
        return $this->hasMany(Curso::class,'id_horario');
    }
}
