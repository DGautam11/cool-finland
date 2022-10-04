<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
                'emp_name'=>$this->faker->name(),
                'emp_address'=>$this->faker->address(),
                'emp_phone'=>$this->faker->unique()->phoneNumber(),
                'emp_email'=>Str::random(10).'@coolfinland.fi'
            ];
            //
        
    }
}
