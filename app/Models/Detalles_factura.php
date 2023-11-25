<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalles_factura extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'n_factura',
        'id_cuota',
        'subtotal', 
    ];
    protected $primaryKey = ['n_factura', 'id_cuota'];
    public function factura() {
        return $this->belongsTo(Factura::class,'n_factura');
    }
    public function cuota() {
        return $this->belongsTo(Cuota::class,'id_cuota');
    }
}
