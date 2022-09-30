<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'street' => fake()->streetName(),
            'number' => fake()->numberBetween(1, 10000),
            'city' => 'Bahía Blanca',
            'province' => 'Buenos Aires'
        ];
    }
}
