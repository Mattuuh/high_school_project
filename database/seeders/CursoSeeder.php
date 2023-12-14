<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::create([
            "nombre" => 1,
            'division' => "A",
            'cupos' => 26,
            'disponibilidad' => 26,
            'anio_lectivo' => 5,
            'id_horario' => 2,
        ]);
        Curso::create([
            "nombre" => 1,
            'division' => "B",
            'cupos' => 22,
            'disponibilidad' => 22,
            'anio_lectivo' => 2,
            'id_horario' => 2,
        ]);
        Curso::create([
            "nombre" => 1,
            'division' => "C",
            'cupos' => 25,
            'disponibilidad' => 25,
            'anio_lectivo' => 9,
            'id_horario' => 6,
        ]);
        Curso::create([
            "nombre" => 2,
            'division' => "A",
            'cupos' => 28,
            'disponibilidad' => 28,
            'anio_lectivo' => 9,
            'id_horario' => 1,
        ]);
        Curso::create([
            "nombre" => 2,
            'division' => "B",
            'cupos' => 28,
            'disponibilidad' => 28,
            'anio_lectivo' => 9,
            'id_horario' => 1,
        ]);
        Curso::create([
            "nombre" => 3,
            'division' => "A",
            'cupos' => 25,
            'disponibilidad' => 25,
            'anio_lectivo' => 2,
            'id_horario' => 8,
        ]);
        Curso::create([
            "nombre" => 3,
            'division' => "A",
            'cupos' => 26,
            'disponibilidad' => 26,
            'anio_lectivo' => 5,
            'id_horario' => 2,
        ]);
        Curso::create([
            "nombre" => 3,
            'division' => "B",
            'cupos' => 28,
            'disponibilidad' => 28,
            'anio_lectivo' => 5,
            'id_horario' => 8,
        ]);
        Curso::create([
            "nombre" => 4,
            'division' => "A",
            'cupos' => 21,
            'disponibilidad' => 21,
            'anio_lectivo' => 5,
            'id_horario' => 1,
        ]);
        Curso::create([
            "nombre" => 5,
            'division' => "A",
            'cupos' => 20,
            'disponibilidad' => 20,
            'anio_lectivo' => 7,
            'id_horario' => 8,
        ]);
    }
}
