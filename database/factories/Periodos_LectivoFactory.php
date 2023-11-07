<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodos_Lectivo>
 */
class Periodos_LectivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plan_estudio_pl' => fake()->word(),
            'modalidad_pl'=> fake()->word(),
        ];
    }
}
