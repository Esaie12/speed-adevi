<?php

namespace Database\Factories;
use App\Models\Dons;
use App\Models\DonsCollect;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonsCollect>
 */
class DonsCollectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'don_id' => \App\Models\Dons::factory(),
            'amount' => $this->faker->numberBetween(10, 500),
            'transaction_id' => $this->faker->unique()->word,
            'anonyme' => $this->faker->boolean,
        ];
    }
}
