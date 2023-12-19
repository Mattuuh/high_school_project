<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Horario::create([
            'docente' => 1,
            'materia' => 1,
            'hora_clase' => 1,
            'curso' => 1,
            'id_dia' => 1
        ]);
        Horario::create([
            'docente' => 5,
            'materia' => 2,
            'hora_clase' => 1,
            'curso' => 1,
            'id_dia' => 2
        ]);
        Horario::create([
            'docente' => 9,
            'materia' => 3,
            'hora_clase' => 1,
            'curso' => 1,
            'id_dia' => 3
        ]);
        Horario::create([
            'docente' => 1,
            'materia' => 1,
            'hora_clase' => 1,
            'curso' => 1,
            'id_dia' => 4
        ]);
        Horario::create([
            'docente' => 13,
            'materia' => 4,
            'hora_clase' => 1,
            'curso' => 1,
            'id_dia' => 5
        ]);
        
        Horario::create([
            'docente' => 1,
            'materia' => 1,
            'hora_clase' => 2,
            'curso' => 1,
            'id_dia' => 1
        ]);
        Horario::create([
            'docente' => 5,
            'materia' => 2,
            'hora_clase' => 2,
            'curso' => 1,
            'id_dia' => 2
        ]);
        Horario::create([
            'docente' => 9,
            'materia' => 3,
            'hora_clase' => 2,
            'curso' => 1,
            'id_dia' => 3
        ]);
        Horario::create([
            'docente' => 5,
            'materia' => 2,
            'hora_clase' => 2,
            'curso' => 1,
            'id_dia' => 4
        ]);
        Horario::create([
            'docente' => 13,
            'materia' => 4,
            'hora_clase' => 2,
            'curso' => 1,
            'id_dia' => 5
        ]);
        
        Horario::create([
            'docente' => 9,
            'materia' => 3,
            'hora_clase' => 3,
            'curso' => 1,
            'id_dia' => 1
        ]);
        Horario::create([
            'docente' => 13,
            'materia' => 4,
            'hora_clase' => 3,
            'curso' => 1,
            'id_dia' => 2
        ]);
        Horario::create([
            'docente' => 16,
            'materia' => 5,
            'hora_clase' => 3,
            'curso' => 1,
            'id_dia' => 3
        ]);
        Horario::create([
            'docente' => 20,
            'materia' => 6,
            'hora_clase' => 3,
            'curso' => 1,
            'id_dia' => 4
        ]);
        Horario::create([
            'docente' => 13,
            'materia' => 4,
            'hora_clase' => 3,
            'curso' => 1,
            'id_dia' => 5
        ]);
        
        Horario::create([
            'docente' => 9,
            'materia' => 3,
            'hora_clase' => 4,
            'curso' => 1,
            'id_dia' => 1
        ]);
        Horario::create([
            'docente' => 13,
            'materia' => 4,
            'hora_clase' => 4,
            'curso' => 1,
            'id_dia' => 2
        ]);
        Horario::create([
            'docente' => 16,
            'materia' => 5,
            'hora_clase' => 4,
            'curso' => 1,
            'id_dia' => 3
        ]);
        Horario::create([
            'docente' => 20,
            'materia' => 6,
            'hora_clase' => 4,
            'curso' => 1,
            'id_dia' => 4
        ]);
        Horario::create([
            'docente' => 5,
            'materia' => 2,
            'hora_clase' => 4,
            'curso' => 1,
            'id_dia' => 5
        ]);
        
        Horario::create([
            'docente' => 16,
            'materia' => 5,
            'hora_clase' => 5,
            'curso' => 1,
            'id_dia' => 1
        ]);
        Horario::create([
            'docente' => 1,
            'materia' => 1,
            'hora_clase' => 5,
            'curso' => 1,
            'id_dia' => 2
        ]);
        Horario::create([
            'docente' => 20,
            'materia' => 6,
            'hora_clase' => 5,
            'curso' => 1,
            'id_dia' => 3
        ]);
        Horario::create([
            'docente' => 20,
            'materia' => 6,
            'hora_clase' => 5,
            'curso' => 1,
            'id_dia' => 4
        ]);
        Horario::create([
            'docente' => 5,
            'materia' => 2,
            'hora_clase' => 5,
            'curso' => 1,
            'id_dia' => 5
        ]);
        
        Horario::create([
            'docente' => 16,
            'materia' => 5,
            'hora_clase' => 6,
            'curso' => 1,
            'id_dia' => 1
        ]);
        Horario::create([
            'docente' => 20,
            'materia' => 6,
            'hora_clase' => 6,
            'curso' => 1,
            'id_dia' => 2
        ]);
        Horario::create([
            'docente' => 20,
            'materia' => 6,
            'hora_clase' => 6,
            'curso' => 1,
            'id_dia' => 3
        ]);
        Horario::create([
            'docente' => 9,
            'materia' => 3,
            'hora_clase' => 6,
            'curso' => 1,
            'id_dia' => 4
        ]);
        Horario::create([
            'docente' => 23,
            'materia' => 7,
            'hora_clase' => 6,
            'curso' => 1,
            'id_dia' => 5
        ]);

        Horario::create([
            'docente' => 23,
            'materia' => 7,
            'hora_clase' => 7,
            'curso' => 1,
            'id_dia' => 5
        ]);
    }
}
