<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherDetails>
 */
class TeacherDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_teacher' => fake()->name(),
            'lastname_teacher' => fake()->lastName(),
            'email_teacher' => fake()->unique()->safeEmail(),
            'password_teacher' => fake()->password(),
            
        ];
    }
}
