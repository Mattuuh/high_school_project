<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_emp',
        'apellido_emp',
        'dni_emp',
        'domicilio_emp',
        'telefono_emp',
        'email_emp',
        'fecha_ingreso_emp',
        'fecha_egreso_emp',
        'tipo_emp',
    ];
    protected $primaryKey = 'legajo_emp';

    // INNER JOIN con la tabla Tipos_empleados por medio de la FK tipo_emp
    public function tipo_empleado() {
        return $this->belongsTo( Tipos_empleado::class,'tipo_emp');
    }

    /* 

    **** EJEMPLO DEL USO DE CLAVES PRIMARIAS COMPUESTAS Y FORANEAS

    // Usuario.php
    class Usuario extends Model
    {
        protected $primaryKey = 'id_usuario';

        public function roles()
        {
            return $this->belongsToMany(Rol::class, 'usuario_rol', 'id_usuario', 'id_rol');
        }
    }

    // Rol.php
    class Rol extends Model
    {
        protected $primaryKey = 'id_rol';

        public function usuarios()
        {
            return $this->belongsToMany(Usuario::class, 'usuario_rol', 'id_rol', 'id_usuario');
        }
    }

    // UsuarioRol.php
    class UsuarioRol extends Model
    {
        protected $table = 'usuario_rol';
        protected $primaryKey = ['id_usuario', 'id_rol'];
        public $incrementing = false;

        public function usuario()
        {
            return $this->belongsTo(Usuario::class, 'id_usuario');
        }

        public function rol()
        {
            return $this->belongsTo(Rol::class, 'id_rol');
        }
    }


    */
}