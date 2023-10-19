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
        Tipos_empleado::factory(10)->create();
    }
}
