<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'number_rooms' => $this->faker->numberBetween(1,6),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'description' => $this->faker->text(2200),
        ];
    }
}
