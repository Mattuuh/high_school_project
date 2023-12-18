<?php

namespace Database\Seeders;

use App\Models\Factura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Factura::create([
            'id' => 1,
            'id_caja' => 1,
            'id_alumno' => 1,
            'id_forma_pago' => 1,
            'id_cuota' => 2,
            'total' => 27000,
            'created_at' => '2023-04-1 09:15:00',
        ]);

        Factura::create([
            'id' => 2,
            'id_caja' => 1,
            'id_alumno' => 3,
            'id_forma_pago' => 1,
            'id_cuota' => 2,
            'total' => 27000,
            'created_at' => '2023-04-1 09:50:00',
        ]);

        Factura::create([
            'id' => 3,
            'id_caja' => 1,
            'id_alumno' => 4,
            'id_forma_pago' => 1,
            'id_cuota' => 2,
            'total' => 27000,
            'created_at' => '2023-04-1 10:15:00',
        ]);

        Factura::create([
            'id' => 4,
            'id_caja' => 1,
            'id_alumno' => 5,
            'id_forma_pago' => 2,
            'id_cuota' => 1,
            'total' => 27000,
            'created_at' => '2023-04-1 10:25:00',
        ]);

        Factura::create([
            'id' => 1,
            'id_caja' => 1,
            'id_alumno' => 5,
            'id_forma_pago' => 1,
            'id_cuota' => 2,
            'total' => 27000,
            'created_at' => '2023-04-1 10:50:00',
        ]);

        Factura::create([
            'id' => 1,
            'id_caja' => 1,
            'id_alumno' => 5,
            'id_forma_pago' => 1,
            'id_cuota' => 3,
            'total' => 27000,
            'created_at' => '2023-04-1 11:15:00',
        ]);

        Factura::create([
            'id' => 1,
            'id_caja' => 1,
            'id_alumno' => 5,
            'id_forma_pago' => 3,
            'id_cuota' => 4,
            'total' => 27000,
            'created_at' => '2023-04-1 11:25:00',
        ]);

        Factura::create([
            'id' => 1,
            'id_caja' => 1,
            'id_alumno' => 8,
            'id_forma_pago' => 1,
            'id_cuota' => 2,
            'total' => 27000,
            'created_at' => '2023-04-1 11:30:00',
        ]);
    }
}
