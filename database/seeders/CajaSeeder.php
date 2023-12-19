<?php

namespace Database\Seeders;

use App\Models\Caja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 31000,
            'closed_at'=>'2023-04-01 12:00:00',
            'created_at'=>'2023-04-1 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 85000,
            'closed_at'=>'2023-04-07 12:00:00',
            'created_at'=>'2023-04-07 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 220000,
            'closed_at'=>'2023-04-10 12:00:00',
            'created_at'=>'2023-04-10 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 328000,
            'closed_at'=>'2023-04-15 12:00:00',
            'created_at'=>'2023-04-15 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 544000,
            'closed_at'=>'2023-04-17 12:00:00',
            'created_at'=>'2023-04-17 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 274000,
            'closed_at'=>'2023-05-07 12:00:00',
            'created_at'=>'2023-05-07 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 193000,
            'closed_at'=>'2023-05-10 12:00:00',
            'created_at'=>'2023-05-10 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 139000,
            'closed_at'=>'2023-05-13 12:00:00',
            'created_at'=>'2023-05-13 09:00:00'
        ]);
        
        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 112000,
            'closed_at'=>'2023-05-14 12:00:00',
            'created_at'=>'2023-05-14 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 247000,
            'closed_at'=>'2023-05-15 12:00:00',
            'created_at'=>'2023-05-15 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 139000,
            'closed_at'=>'2023-05-16 12:00:00',
            'created_at'=>'2023-05-16 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 301000,
            'closed_at'=>'2023-05-17 12:00:00',
            'created_at'=>'2023-05-17 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 625000,
            'closed_at'=>'2023-05-20 12:00:00',
            'created_at'=>'2023-05-20 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 760000,
            'closed_at'=>'2023-05-23 12:00:00',
            'created_at'=>'2023-05-23 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 139000,
            'closed_at'=>'2023-05-26 12:00:00',
            'created_at'=>'2023-05-26 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 220000,
            'closed_at'=>'2023-05-28 12:00:00',
            'created_at'=>''
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 328000,
            'closed_at'=>'2023-06-13 12:00:00',
            'created_at'=>'2023-06-13 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 706000,
            'closed_at'=>'2023-06-15 12:00:00',
            'created_at'=>'2023-06-15 09:00:00'
        ]);

        Caja::create([
            
            'legajo_emp' => 1,
            'monto_inicial' =>4000 ,
            'monto_cierre' => 814000,
            'closed_at'=>'2023-06-17 12:00:00',
            'created_at'=>'2023-06-17 12:00:00'
        ]);
        
    }
}
