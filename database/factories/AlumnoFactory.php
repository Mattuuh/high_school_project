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
            'nombre_alu' => fake()->name(),
            'apellido_alu' => fake()->lastName(),
            'dni_alu' => fake()->randomNumber(8, true),
            'domicilio_alu' => fake()->address(),
            'telefono_alu' => fake()->randomNumber(8, true),
            'email_alu' => fake()->email(),
            'fecha_inscrip_alu' => fake()->date(),
            'id_curso' => fake()->numberBetween(1,9),
        ];
    }
}
