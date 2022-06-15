<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameTag>
 */
class GameTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
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

    /**
     * Indicate that the model's en_us fields are filled.
     *
     * @return static
     */
    public function withEnUsLocalization()
    {
        return $this->state(function (array $attributes) {
            return [
                'en_us_name' => $this->faker->name()
            ];
        });
    }
}
