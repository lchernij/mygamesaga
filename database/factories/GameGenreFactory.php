<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameGenre>
 */
class GameGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'acronym' => $this->faker->text(5),
            'pt_br_name' => $this->faker->name()
        ];
    }

    /**
     * Indicate that the model's is_active should be false.
     *
     * @return static
     */
    public function isInactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }
}
