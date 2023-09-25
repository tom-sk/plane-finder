<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'startX' => fake()->randomFloat(2, 0.01, 50),
            'startY' => fake()->randomFloat(2, 0.01, 50),
            'endX' => fake()->randomFloat(2, 0.01, 50),
            'endY' => fake()->randomFloat(2, 0.01, 50),
            'speed' => fake()->randomDigit(),
            'code' => fake()->countryCode() . '-' . fake()->randomNumber(3) . '-' . fake()->randomNumber(3),
            'description' => fake()->sentence(),
        ];
    }
}
