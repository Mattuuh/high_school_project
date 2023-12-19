<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_administrativo = Role::create(['name' => 'administrativo']); // Caja
        $rol_cajero = Role::create(['name' => 'cajero']);
        $rol_secretario = Role::create(['name' => 'secretario']);
        $rol_preceptor = Role::create(['name' => 'preceptor']); // asistencia, cargar notas, alumnos
        $rol_directivo = Role::create(['name' => 'directivo']); // todoo
        $rol_profesor = Role::create(['name' => 'profesor']); // ?

        // Permisos para cada Rol
        Permission::create(['name' => 'registro_pago'])->assignRole($rol_cajero, $rol_admin);
        Permission::create(['name' => 'registro_alumno'])->assignRole($rol_preceptor, $rol_secretario, $rol_admin);
        Permission::create(['name' => 'registro_nota'])->assignRole($rol_preceptor, $rol_secretario, $rol_admin);
        Permission::create(['name' => 'ver_alumno'])->assignRole($rol_preceptor, $rol_secretario, $rol_directivo, $rol_admin);
        Permission::create(['name' => 'ver_pago'])->assignRole($rol_cajero, $rol_admin);
        Permission::create(['name' => 'ver_preceptor'])->assignRole($rol_preceptor, $rol_admin);
        Permission::create(['name' => 'ver_secretario'])->assignRole($rol_secretario, $rol_admin);
        Permission::create(['name' => 'ver_admin'])->assignRole($rol_administrativo, $rol_admin);
        /* Permission::create(['name' => 'ver_alumno'])->assignRole();
        Permission::create(['name' => 'ver_alumno'])->assignRole();
        Permission::create(['name' => 'ver_alumno'])->assignRole();
        Permission::create(['name' => 'ver_alumno'])->assignRole(); */
        
        //Permission::create(['name' => 'lista_pagos'])->syncRoles([$rol_vendedor, $rol_cliente]);

    }
}
