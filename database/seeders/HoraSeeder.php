<?php

namespace Database\Seeders;

use App\Models\Hora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hora::create(['hora'=>'1°','hora_inicio'=>'08:00:00', 'hora_fin'=>'08:40:00']);
        Hora::create(['hora'=>'2°','hora_inicio'=>'08:40:00', 'hora_fin'=>'09:20:00']);
        Hora::create(['hora'=>'1° Recreo','hora_inicio'=>'09:20:00', 'hora_fin'=>'09:30:00']);
        Hora::create(['hora'=>'3°','hora_inicio'=>'09:30:00', 'hora_fin'=>'10:10:00']);
        Hora::create(['hora'=>'4°','hora_inicio'=>'10:10:00', 'hora_fin'=>'10:50:00']);
        Hora::create(['hora'=>'2° Recreo','hora_inicio'=>'10:50:00', 'hora_fin'=>'11:00:00']);
        Hora::create(['hora'=>'5°','hora_inicio'=>'11:00:00', 'hora_fin'=>'11:40:00']);
        Hora::create(['hora'=>'6°','hora_inicio'=>'11:40:00', 'hora_fin'=>'12:20:00']);
        Hora::create(['hora'=>'3° Recreo','hora_inicio'=>'12:20:00', 'hora_fin'=>'12:25:00']);
        Hora::create(['hora'=>'7°','hora_inicio'=>'12:25:00', 'hora_fin'=>'13:05:00']);
        Hora::create(['hora'=>'8°','hora_inicio'=>'13:05:00', 'hora_fin'=>'13:45:00']);
    }
}
