<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_id'   => Shop::factory(),
            'post_code' => $this->faker->postcode(),
            'address'   => $this->faker->address(),
            'content'   => $this->faker->realText($this->faker->numberBetween(10, 500)),
            'url'       => 'https://www.google.co.jp/',
            'tel'       => $this->faker->phoneNumber(),
            'holiday'   => $this->faker->regexify('[0-1]{7}'),
            'open'      => $this->faker->time(),
            'close'     => $this->faker->time(),
        ];
    }
}
