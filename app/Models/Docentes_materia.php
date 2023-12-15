<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docentes_materia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_materia',
        'id_docente',
    ];
    public function materias()
    {
        return $this->belongsTo(Materia::class,'id_materia');
    }
    public function docentes()
    {
        return $this->belongsTo(Empleado::class,'id_docente');
    }
}
