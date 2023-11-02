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
    'subtotal', 
    ];
}
