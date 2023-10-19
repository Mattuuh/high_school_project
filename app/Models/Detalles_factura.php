<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_factura extends Model
{
    use HasFactory;
    protected $fillable = [
    'n_factura',
    'subtotal', 
    ];
}
