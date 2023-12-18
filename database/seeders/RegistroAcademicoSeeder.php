<?php

namespace Database\Seeders;

use App\Models\RegistroAcademico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegistroAcademico::create([
            'id' => 1,
            'id_alumno' => 1,
            'id_docxmat' => 1,
            'nota' => 10,
            'fecha' => '2023-06-10',
            'id_instancia' => 1,
        ]);

        RegistroAcademico::create([
            'id' => 2,
            'id_alumno' => 2,
            'id_docxmat' => 1,
            'nota' => 8,
            'fecha' => '2023-06-10',
            'id_instancia' => 1,
        ]);

        RegistroAcademico::create([
            'id' => 3,
            'id_alumno' => 3,
            'id_docxmat' => 1,
            'nota' => 5,
            'fecha' => '2023-06-10',
            'id_instancia' => 1,
        ]);

        RegistroAcademico::create([
            'id' => 1,
            'id_alumno' => 4,
            'id_docxmat' => 1,
            'nota' => 8,
            'fecha' => '2023-06-10',
            'id_instancia' => 1,
        ]);

        RegistroAcademico::create([
            'id' => 1,
            'id_alumno' => 5,
            'id_docxmat' => 1,
            'nota' => 8,
            'fecha' => '2023-06-10',
            'id_instancia' => 1,
        ]);

        RegistroAcademico::create([
            'id' => 1,
            'id_alumno' => 7,
            'id_docxmat' => 1,
            'nota' => 9,
            'fecha' => '2023-06-10',
            'id_instancia' => 1,
        ]);

        RegistroAcademico::create([
            'id' => 1,
            'id_alumno' => 8,
            'id_docxmat' => 1,
            'nota' => 10,
            'fecha' => '2023-06-10',
            'id_instancia' => 1,
        ]);
    }
}
