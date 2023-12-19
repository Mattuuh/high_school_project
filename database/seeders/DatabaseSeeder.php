<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hora;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(TiposEmpleadoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PeriodosLectivoSeeder::class);        
        $this->call(CursoSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(CuotaSeeder::class);
        $this->call(FormasPagoSeeder::class);
        $this->call(EstadosAsistenciaSeeder::class);
        $this->call(HoraSeeder::class);
        $this->call(DiaSeeder::class);
        $this->call(MateriaSeeder::class);
        $this->call(HorarioSeeder::class);
        
    }
}
