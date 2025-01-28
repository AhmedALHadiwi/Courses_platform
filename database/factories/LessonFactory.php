<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
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
            'title' => fake()->sentence(3),
            'content' => fake()->paragraph,
            'video_url' => fake()->url,
            'duration' => fake()->numberBetween(10, 60),
            'order' => fake()->numberBetween(1, 10),
        ];
    }
}
