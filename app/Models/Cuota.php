<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuota extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'mes',
        'monto',
        'interes',
    ];
    public function detalles_facturas() {
        return $this->hasMany(Detalles_factura::class,'id_couta');
    }
    public function facturas() {
        return $this->hasMany(Factura::class,'id_cuota');
    }
}
