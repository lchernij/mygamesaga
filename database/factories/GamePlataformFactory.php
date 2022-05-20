<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GamePlataform>
 */
class GamePlataformFactory extends Factory
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
            'company' => $this->faker->name(),
            'acronym' => $this->faker->text(5)
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
