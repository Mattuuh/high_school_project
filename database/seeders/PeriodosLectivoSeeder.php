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
        Periodos_lectivo::factory()->count(9)->create();
    }
}
