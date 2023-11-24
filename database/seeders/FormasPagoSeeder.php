<?php

namespace Database\Seeders;

use App\Models\Formas_pago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormasPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Formas_pago::create(['detalle_fp'=>'Efectivo']);
        Formas_pago::create(['detalle_fp'=>'Tarjeta de Credito']);
        Formas_pago::create(['detalle_fp'=>'Tarjeta de Debito']);
        Formas_pago::create(['detalle_fp'=>'Transferencia']);
    }
}
