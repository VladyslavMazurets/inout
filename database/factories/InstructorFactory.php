<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $firstName = fake()->firstName();
        $lastName = fake()->lastName();

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'slug' => $firstName . '-' . $lastName,
            'description' => fake()->paragraph(),
            'position' => fake()->jobTitle(),
            'instagram_link' => fake()->url(),
            'telegram_link' => fake()->url(),
            'custom_link' => fake()->url(),
        ];
    }
}
