<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HousingProject>
 */
class HousingProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'house_id' => $this->faker->unique()->numberBetween(1, 60),
            'user_id' => fake()->numberBetween(1, 2),
            'payment_number' => $this->faker->numberBetween(1, 12),
        ];
    }
}
