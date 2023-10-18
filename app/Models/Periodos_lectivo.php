<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodos_lectivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_estudio_pl',
        'modalidad_pl',
    ];
    protected $table = 'periodos_lectivo';
    protected $primaryKey= 'anio';
}
