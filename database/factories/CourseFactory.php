<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph,
            'price' => fake()->randomFloat(2, 10, 200),
            'duration' => fake()->numberBetween(1, 100),
            'language' => fake()->randomElement(['English', 'French', 'German', 'Spanish', 'Arabic']),
            'level' => fake()->randomElement([
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
            'instructor_id' => fake()->numberBetween(1, 20),
        ];
    }
}
