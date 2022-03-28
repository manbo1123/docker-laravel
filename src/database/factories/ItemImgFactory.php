<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemImgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            '1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg', 
            '6.jpg', '7.jpeg', '8.jpeg', '9.jpeg', '10.jpeg', '11.jpeg', '12.jpeg', 
        ];
        return [
            'name' => $this->faker->randomElement($images),
            'item_id' => $this->faker->numberBetween(1,30),
        ];
    }
}
