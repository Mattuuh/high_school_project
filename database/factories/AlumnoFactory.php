<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'apellido' => fake()->lastName(),
            'dni' => fake()->randomNumber(8, true),
            'domicilio' => fake()->address(),
            'telefono' => fake()->randomNumber(8, true),
            'email' => fake()->email(),
            'id_curso' => fake()->numberBetween(1,13),
        ];
    }
}
