<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolDetails>
 */
class SchoolDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_school' => fake()->name(),
            'address_school' => fake()->address(),
            'email_school' => fake()->unique()->safeEmail(),
            'phone_school' => fake()->phoneNumber(),
            'website_school' => fake()->url(),
            'description_school' => fake()->realtext(500),
            'image_path' => fake()->imageUrl(),
        ];
    }
}
