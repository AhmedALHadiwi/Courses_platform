<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EnrollmentQuiz>
 */
class EnrollmentQuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enrollment_id' => fake()->numberBetween(1, 50),
            'quiz_id' => fake()->numberBetween(1, 20),
            'grade' => fake()->numberBetween(0, 100),
        ];
    }
}
