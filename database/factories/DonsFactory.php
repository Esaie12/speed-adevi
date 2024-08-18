<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dons>
 */
class DonsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => $this->faker->unique()->word,
            'picture' => 'default-picture.jpg',
            'title' => $this->faker->sentence,
            'started' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'finished' => $this->faker->dateTimeBetween('now', '+1 month'),
            'cagnotte' => $this->faker->numberBetween(1000, 20000),
            'amount_collect' => $this->faker->numberBetween(0, 5000),
            'description' => $this->faker->paragraph,
            'tags' => json_encode([]),
            'slug' => $this->faker->slug,
        ];
    }
}
