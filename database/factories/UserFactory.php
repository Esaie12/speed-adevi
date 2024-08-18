<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'avatar' => $this->faker->imageUrl(100, 100, 'people'), // Image aléatoire
            'role' => $this->faker->randomElement(['admin', 'user']), // Exemple de rôles
            'account_id' => "US".date('Y').$this->faker->numberBetween(1, 100),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('P@ssw0rd'), // Mot de passe par défaut
            'profession' => $this->faker->jobTitle,
            'website' => $this->faker->url,
            'country' => $this->faker->country,
            'department' => "Department",
            'others' => $this->faker->sentence,
            'actif' => $this->faker->boolean,
            'last_login' => $this->faker->dateTimeThisYear,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }


    public function administrateur(): static
    {
        return  $this->state(fn (array $attributes) => [
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'avatar' => $this->faker->imageUrl(100, 100, 'people'), // Image aléatoire
            'role' => 'admin', // Exemple de rôles
            'account_id' => "AD".date('Y').$this->faker->numberBetween(1, 100),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('P@ssw0rd'), // Mot de passe par défaut
            'profession' => $this->faker->jobTitle,
            'website' => $this->faker->url,
            'country' => $this->faker->country,
            'department' => "Department",
            'others' => $this->faker->sentence,
            'actif' => $this->faker->boolean,
            'last_login' => $this->faker->dateTimeThisYear,
        ]);

    }

    public function customer(): static
    {
        return  $this->state(fn (array $attributes) => [
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'avatar' => $this->faker->imageUrl(100, 100, 'people'), // Image aléatoire
            'role' => 'user', // Exemple de rôles
            'account_id' => "US".date('Y').$this->faker->numberBetween(1, 100),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('P@ssw0rd'), // Mot de passe par défaut
            'profession' => $this->faker->jobTitle,
            'website' => $this->faker->url,
            'country' => $this->faker->country,
            'department' => "Department",
            'others' => $this->faker->sentence,
            'actif' => $this->faker->boolean,
            'last_login' => $this->faker->dateTimeThisYear,
            'email_verified_at'=> now(),
        ]);

    }
}
