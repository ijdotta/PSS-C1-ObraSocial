<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'lastname' => fake()->lastName(),
            'date_of_birth' => fake()->date(),
            'DNI' => fake()->numberBetween(1000000, 10000000),
            'email' => fake()->email(),
            'address_id' => 0,
            'plan_id' => 0
        ];
    }
}
