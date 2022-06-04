<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->title(),
            'year' => $this->faker->year(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'demo' => $this->faker->boolean(),
        ];
    }
}
