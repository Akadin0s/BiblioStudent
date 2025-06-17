<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Languages>
 */
class LanguagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_language' => fake()->word(),
            'title_language' => fake()->realtext(20),
            'description_language' => fake()->realtext(50),
            'image_path' => fake()->imageUrl(),
        ];
    }
}
