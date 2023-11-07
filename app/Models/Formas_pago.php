<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formas_pago extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'detalle_fp',
    ];
    public function facturas() {
        return $this->hasMany(Factura::class,'id_forma_pago');
    }
}
