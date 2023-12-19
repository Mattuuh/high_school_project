<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instancia extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'descripcion',
    ];
    public function registrosacademicos(){
        return $this->hasMany(RegistroAcademico::class,'id_instancia');
    }
}
