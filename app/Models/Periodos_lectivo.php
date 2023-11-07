<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periodos_lectivo extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'plan_estudio_pl',
        'modalidad_pl',
    ];
    protected $table = 'periodos_lectivos';
    //protected $primaryKey= 'anio';
    public function cursos() {
        return $this->hasMany(Curso::class,'anio_lectivo');
    }
}
