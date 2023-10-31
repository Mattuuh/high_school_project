<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_te',
    ];

    // INNER JOIN con la tabla Empleados por medio de la FK tipo_emp
    public function empleados() {
        return $this->hasMany( Empleado::class,'tipo_emp');
    }
}
