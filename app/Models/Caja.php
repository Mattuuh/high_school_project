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
        'closed_at'
    ];
    public function empleado() {
        return $this->belongsTo(Empleado::class,'legajo_emp');
    }
    public function facturas() {
        return $this->hasMany(Factura::class,'id_caja');
    }
}
