<?php

namespace Database\Seeders;

use App\Models\Instancia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instancia::create(['descripcion'=>'Primer Trimestre']);
        Instancia::create(['descripcion'=>'Segundo Trimestre']);
        Instancia::create(['descripcion'=>'Tercer Trimestre']);
        Instancia::create(['descripcion'=>'Examen']);
      
    }
}
