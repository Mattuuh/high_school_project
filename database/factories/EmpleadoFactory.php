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
            'nombre_emp' => fake()->name(),
            'apellido_emp' => fake()->lastName(),
            'dni_emp' => fake()->randomNumber(8, true),
            'domicilio_emp' => fake()->address(),
            'telefono_emp' => fake()->randomNumber(8, true),
            'email_emp' => fake()->email(),
            'fecha_ingreso_emp' => fake()->date(),
            'fecha_egreso_emp' => fake()->date(),
            'tipo_emp' => fake()->numberBetween(1,9),
        ];
    }
}
