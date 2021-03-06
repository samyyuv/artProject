<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActualiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(5, true),
            'photo' => $this->faker->imageUrl($width = 640, $height = 480),
            'position' => $this->faker->unique()->numberBetween(1, 10),
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'yesterday'),
            'active' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}
