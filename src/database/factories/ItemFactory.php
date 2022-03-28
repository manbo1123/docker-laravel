<?php

namespace Database\Factories;

use App\Models\Shop;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = DateTime::dateTimeThisDecade();

        return [
            'name'        => $this->faker->realText($this->faker->numberBetween(10, 100)), 
            'content'     => $this->faker->realText($this->faker->numberBetween(10, 2000)),
            'postage'     => $this->faker->randomElement(['全国一律送料無料', '東京は1030円', '690円', '10,800円以上購入で送料無料']),
            'price'       => $this->faker->numberBetween(10, 10000),
            'category_id' => $this->faker->numberBetween(1,331),
            'shop_id'     => $this->faker->numberBetween(1,10),
            'created_at'  => $date,
            'updated_at'  => $date,
        ];
    }
}
