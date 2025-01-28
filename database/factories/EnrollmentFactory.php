<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => fake()->numberBetween(1, 30),
            'user_id' => fake()->numberBetween(1, 50),
            'status' => fake()->randomElement(['Active', 'Completed', 'Cancelled']),
        ];
    }
}
