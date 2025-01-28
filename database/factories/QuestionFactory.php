<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id' => fake()->numberBetween(1, 20),
            'content' => fake()->sentence(10),
            'type' => fake()->randomElement(['MCQ', 'T/F', 'Text']),
            'marks' => fake()->numberBetween(1, 10),
        ];
    }
}
