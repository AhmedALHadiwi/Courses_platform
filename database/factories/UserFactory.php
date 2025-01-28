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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => fake()->randomElement(['student', 'guest', 'admin']),
            'class' => fake()->randomElement([
                "Primary One",
                "Primary Two",
                "Primary Three",
                "Primary Four",
                "Primary Five",
                "Primary Six",
                "Preparatory One",
                "Preparatory Two",
                "Preparatory Three",
                "Secondary One",
                "Secondary Two",
                "Secondary Three"
            ]),
            'profile_picture' => fake()->imageUrl(100, 100, 'people'),
            'score' => fake()->numberBetween(0, 100),
            'bio' => fake()->text(200),
            'phone' => fake()->unique()->phoneNumber,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
