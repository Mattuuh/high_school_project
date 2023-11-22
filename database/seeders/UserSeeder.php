<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'empleado' => 1,
        ])->assignRole('admin');

        User::create([
            'name' => 'Administrativo',
            'email' => 'administrador@gmail.com',
            'password' => Hash::make('12345'),
            'empleado' => 2,
        ])->assignRole('administrativo');

        User::create([
            'name' => 'preceptor',
            'email' => 'preceptor@gmail.com',
            'password' => Hash::make('12345'),
            'empleado' => 3,
        ])->assignRole('preceptor');

        User::create([
            'name' => 'directivo',
            'email' => 'directivo@gmail.com',
            'password' => Hash::make('12345'),
            'empleado' => 4,
        ])->assignRole('directivo');

        User::create([
            'name' => 'profesor',
            'email' => 'profesor@gmail.com',
            'password' => Hash::make('12345'),
            'empleado' => 5,
        ])->assignRole('profesor');
        
    }
}
