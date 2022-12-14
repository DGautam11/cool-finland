<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date'=> Carbon::today()->toDateString(),
            'estimated_time_of_arrival'=>$this->faker->time('H:i:s'),
            'transport_method_id'=>$this->faker->numberBetween(1, 2),
            'status_id'=>1,
            'customer_id'=>$this->faker->numberBetween(1, 10),
            'no_of_containers_or_trucks'=>$this->faker->numberBetween(1, 3),

            //
        ];
    }
}
