<?php

namespace Database\Seeders;

use App\Models\Dia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dia::create([
            'nombre' => 'Lunes'
        ]);
        Dia::create([
            'nombre' => 'Martes'
        ]);
        Dia::create([
            'nombre' => 'Miercoles'
        ]);
        Dia::create([
            'nombre' => 'Jueves'
        ]);
        Dia::create([
            'nombre' => 'Viernes'
        ]);
    }
}