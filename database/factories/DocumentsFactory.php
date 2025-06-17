<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documents>
 */
class DocumentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name_document' => 'Leçon' . fake()->numberBetween(1,10),
        'description_document' => fake()->realText(20),
        'file_document' => fake()->filePath(),
        'niveau_document' => 'niveau ' . fake()->numberBetween(1, 6),
        'language' => fake()->randomElement(['Français', 'Anglais']), 
        ];
    }
}
