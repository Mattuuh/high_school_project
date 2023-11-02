<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caja extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
            'legajo_emp',              
            'monto_inicial',
            'monto_cierre',
            'fecha_caja',

    ];
}
