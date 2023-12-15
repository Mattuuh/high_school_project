<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materia::create(['nom_materia'=>'Ingles', 'anio_materia' => '2023']);
        Materia::create(['nom_materia'=>'Lengua', 'anio_materia' => '2023']);
        Materia::create(['nom_materia'=>'Matemáticas', 'anio_materia' => '2023']);
        Materia::create(['nom_materia'=>'Historia', 'anio_materia' => '2023']);
        Materia::create(['nom_materia'=>'Quimica', 'anio_materia' => '2023']);
        Materia::create(['nom_materia'=>'Biologia', 'anio_materia' => '2023']);
        Materia::create(['nom_materia'=>'Educacion Fisica', 'anio_materia' => '2023']);

    }
}
