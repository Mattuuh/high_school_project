<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
            'fecha_pago',          
            'id_caja',
            'legajo_alu',
            'id_forma_pago',
            'total', 
];
}
