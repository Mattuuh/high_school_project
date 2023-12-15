<?php

namespace Database\Seeders;

use App\Models\Docentes_materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocentesMateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Docentes_materia::create([
            'id_materia' => 1,
            'id_docente' => 1,
        ]);
        Docentes_materia::create([
            'id_materia' => 1,
            'id_docente' => 2,
        ]);
        Docentes_materia::create([
            'id_materia' => 1,
            'id_docente' => 3,
        ]);
        Docentes_materia::create([
            'id_materia' => 1,
            'id_docente' => 4,
        ]);
        Docentes_materia::create([
            'id_materia' => 2,
            'id_docente' => 5,
        ]);
        Docentes_materia::create([
            'id_materia' => 2,
            'id_docente' => 6,
        ]);
        Docentes_materia::create([
            'id_materia' => 2,
            'id_docente' => 7,
        ]);
        Docentes_materia::create([
            'id_materia' => 2,
            'id_docente' => 8,
        ]);
        Docentes_materia::create([
            'id_materia' => 3,
            'id_docente' => 9,
        ]);
        Docentes_materia::create([
            'id_materia' => 3,
            'id_docente' => 10,
        ]);
        Docentes_materia::create([
            'id_materia' => 3,
            'id_docente' => 11,
        ]);
        Docentes_materia::create([
            'id_materia' => 3,
            'id_docente' => 12,
        ]);
        Docentes_materia::create([
            'id_materia' => 4,
            'id_docente' => 13,
        ]);
        Docentes_materia::create([
            'id_materia' => 4,
            'id_docente' => 14,
        ]);
        Docentes_materia::create([
            'id_materia' => 4,
            'id_docente' => 15,
        ]);
        Docentes_materia::create([
            'id_materia' => 5,
            'id_docente' => 16,
        ]);
        Docentes_materia::create([
            'id_materia' => 5,
            'id_docente' => 17,
        ]);
        Docentes_materia::create([
            'id_materia' => 5,
            'id_docente' => 18,
        ]);
        Docentes_materia::create([
            'id_materia' => 5,
            'id_docente' => 19,
        ]);
        Docentes_materia::create([
            'id_materia' => 6,
            'id_docente' => 20,
        ]);
        Docentes_materia::create([
            'id_materia' => 6,
            'id_docente' => 21,
        ]);
        Docentes_materia::create([
            'id_materia' => 6,
            'id_docente' => 22,
        ]);
        Docentes_materia::create([
            'id_materia' => 7,
            'id_docente' => 23,
        ]);
        Docentes_materia::create([
            'id_materia' => 7,
            'id_docente' => 24,
        ]);
        Docentes_materia::create([
            'id_materia' => 7,
            'id_docente' => 25,
        ]);
    }
}
