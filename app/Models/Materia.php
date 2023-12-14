<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materia extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nom_materia',
        'anio_materia',
    ];

    public function horario()
    {
        return $this->hasMany(Horario::class,'materia');
    }
    public function docentes_materia()
    {
        return $this->hasMany(Docentes_materia::class,'id_materia');
    }
   
}
