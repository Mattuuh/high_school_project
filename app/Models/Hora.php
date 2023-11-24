<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hora extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'hora',
        'hora_inicio',
        'hora_fin', 
    ];
    
    public function horario()
    {
        return $this->hasMany(Horario::class);
    }
}
