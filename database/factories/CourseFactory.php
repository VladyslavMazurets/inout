<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' => fake()->sentence(),
            'slug' => fake()->slug(2),
            'description' => fake()->paragraphs(3, true),
            'price' => fake()->numberBetween(1000, 10000),
            'discount' => fake()->numberBetween(0, 100),
            'duration' => fake()->numberBetween(1, 10),
            'content' => fake()->paragraphs(3, true),
        ];
    }
}