<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
            'fecha_pago',          
            'id_caja',
            'legajo_alu',
            'id_forma_pago',
            'total', 
];
}
