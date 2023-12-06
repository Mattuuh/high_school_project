<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_caja',
        'legajo_alu',
        'id_forma_pago',
        'id_cuota',
        'total',
    ];

    public function caja() {
        return $this->belongsTo(Caja::class,'id_caja');
    }
    public function forma_pago() {
        return $this->belongsTo(Formas_pago::class,'id_forma_pago');
    }
    public function alumno() {
        return $this->belongsTo(Alumno::class,'legajo_alu');
    }
    public function cuota() {
        return $this->belongsTo(Cuota::class,'id_cuota');
    }
    /* public function detalles_factura() {
        return $this->hasMany(Detalles_factura::class,'n_factura');
    } */
}
