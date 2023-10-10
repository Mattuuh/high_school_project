<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodosLectivos extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'periodos_lectivo';
    protected $primaryKey= 'anio';
    
}