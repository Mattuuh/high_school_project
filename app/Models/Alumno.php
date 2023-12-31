<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'domicilio',
        'telefono',
        'email',        
        'id_curso',  
    ];
    // factura -> detalle -> cuota
    public function curso() {
        return $this->belongsTo(Curso::class,'id_curso');
    }
    public function facturas() {
        return $this->hasMany(Factura::class,'legajo_alu');
    }
}
