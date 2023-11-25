<?php

namespace Database\Seeders;

use App\Models\Tipos_empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipos_empleado::create(['nombre_te' => 'preceptor']);
        Tipos_empleado::create(['nombre_te' => 'gerente']);
        Tipos_empleado::create(['nombre_te' => 'ordenanza']);
        Tipos_empleado::create(['nombre_te' => 'profesor']);
        Tipos_empleado::create(['nombre_te' => 'secretario']);
        Tipos_empleado::create(['nombre_te' => 'administrativo']);
    }
}
