<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->text(20),
            'Description' => $this->faker->text(50),
            'clasificacion' => $this->faker->text(10),
            'anio' => $this->faker->text(15),
            'Tipo' => $this->faker->text(50),
        ];
    }
}
