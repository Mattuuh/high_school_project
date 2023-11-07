<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cupos' => fake()->numberBetween(20,30),
            'disponibilidad'=> fake()->numberBetween(1,30),
            'anio_lectivo'=> fake()->numberBetween(1,9),
            'id_horario'=> fake()->numberBetween(1,9),
        ];
    }
}
