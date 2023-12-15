<?php

namespace Database\Seeders;

use App\Models\Periodos_lectivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodosLectivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Periodos_lectivo::factory()->count(9)->create();
        Periodos_lectivo::create([
            'plan_estudio' => 'Ciclo basico',
            'modalidad' => 'Basico',
            'anio' => '2023',
        ]);
        Periodos_lectivo::create([
            'plan_estudio' => 'Ciclo Orientado',
            'modalidad' => 'Ciencias Sociales',
            'anio' => '2023',
        ]);
        Periodos_lectivo::create([
            'plan_estudio' => 'Ciclo Orientado',
            'modalidad' => 'Ciencias Naturales',
            'anio' => '2023',
        ]);
        Periodos_lectivo::create([
            'plan_estudio' => 'Ciclo Orientado',
            'modalidad' => 'Economia',
            'anio' => '2023',
        ]);
    }
}
