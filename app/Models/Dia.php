<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre'
    ];
    public function horarios()
    {
        return $this->hasMany(Horario::class,'id_dia');
    }
}
