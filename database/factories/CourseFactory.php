<?php

namespace Database\Factories;

use App\Models\Course;
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
            'title' => fake()->sentence(1),
            'slug' => fake()->slug(2),
            'description' => fake()->paragraphs(3, true),
            'price' => fake()->numberBetween(1000, 10000),
            'discount' => fake()->numberBetween(0, 100),
            'duration' => fake()->numberBetween(1, 10),
            'content' => fake()->paragraphs(3, true),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            $course->addMediaFromUrl("https://picsum.photos/id/{$course->id}/200/300")
                ->toMediaCollection('baner');
        });
    }
}
