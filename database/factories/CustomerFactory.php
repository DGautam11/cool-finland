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
            'customer_name'=>$this->faker->unique()->company(),
            'customer_address'=>$this->faker->unique()->address(),
            'customer_phone'=>$this->faker->unique()->phoneNumber(),
            'customer_mail'=>$this->faker->unique()->safeEmail()
        ];
    }
}
