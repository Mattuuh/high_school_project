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
        Materia::create(['nom_materia'=>'Ingles']);
        Materia::create(['nom_materia'=>'Lengua']);
        Materia::create(['nom_materia'=>'Matemáticas']);
        Materia::create(['nom_materia'=>'Historia']);
        Materia::create(['nom_materia'=>'Quimica']);
        Materia::create(['nom_materia'=>'Biologia']);
        Materia::create(['nom_materia'=>'Educacion Fisica']);
        Materia::create(['nom_materia'=>'Recreo']);

    }
}
