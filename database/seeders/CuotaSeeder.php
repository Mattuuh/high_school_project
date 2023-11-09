<?php

namespace Database\Seeders;

use App\Models\Cuota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cuota::create([
            'mes' => 'Febrero',
            'monto' => '27000',
            'interes' => '0.0',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Marzo',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Abril',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Mayo',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Junio',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Julio',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Agosto',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Septiembre',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Octubre',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Noviembre',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
        Cuota::create([
            'mes' => 'Diciembre',
            'monto' => '27000',
            'interes' => '0.15',
            'fecha_creacion' => '0000-00-00',
        ]);
    }
}
