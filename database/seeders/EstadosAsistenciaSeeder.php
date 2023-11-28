<?php

namespace Database\Seeders;

use App\Models\Estados_asistencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosAsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estados_asistencia::create([
            'descripcion_ea' => 'Presente',
        ]);
        Estados_asistencia::create([
            'descripcion_ea' => 'Ausente',
        ]);
        Estados_asistencia::create([
            'descripcion_ea' => 'Justificado',
        ]);
        Estados_asistencia::create([
            'descripcion_ea' => 'Tarde',
        ]);
    }
}
