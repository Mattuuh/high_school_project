<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
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
            'imagen' => fake()->imageUrl(640, 480),
            'domicilio' => fake()->address(),
            'telefono' => fake()->randomNumber(8, true),
            'email' => fake()->email(),
            'tipo_emp' => fake()->numberBetween(1,6),
        ];
    }
}
