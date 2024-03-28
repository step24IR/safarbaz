<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'scale' => rand(50,500),
            'capacity' => rand(1,12),
            'daily_rate' => rand(10,900) * 100000,
            'city_id' => rand(1,440),
            'village' => $this->faker->city,
            'number_of_rooms' => $this->faker->numberBetween(1,10),
            'number_of_bedrooms' => $this->faker->numberBetween(0,6),
            'number_of_bed_one' => $this->faker->numberBetween(0,6),
            'number_of_bed_two' => $this->faker->numberBetween(0,6),
            'number_of_wc_iranian' => $this->faker->numberBetween(1,4),
            'number_of_wc_frangi' => $this->faker->numberBetween(0,4),
            'number_of_tub_bathroom' => $this->faker->numberBetween(0,3),
            'number_of_normal_bathroom' => $this->faker->numberBetween(1,3),
            'textureAndView' =>  $this->faker->randomElement(['روستایی' , 'ساحلی']),
            'address' => $this->faker->text,
            'exclusive' => rand(0,1),
            'floor' => rand(0,10),
            'description' => $this->faker->text,
        ];
    }
}
