<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formas_pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'detalle_fp',
    ];
}
