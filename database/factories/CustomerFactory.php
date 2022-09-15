<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->unique(),
            'customer_name' => fake()->unique(),
            'customer_address' => fake(),
            'customer_email'=> fake()->safeEmail();
            'customer_phone' => fake();
            
        ];
    }
}
