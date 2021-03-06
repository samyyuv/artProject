<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->words(3, true),
            'sous_titre' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(5, true),
            'created_at' => $this->faker->dateTimeBetween('-2 week', 'yesterday'),
        ];
    }
}
