<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = OrderDetail::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'product_id' => rand(1, 20),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'color' => $this->faker->safeColorName,
            'price' => $this->faker->randomFloat(2, 10, 50),
            'quantity' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomFloat(2, 100, 500),
            'order_date_time' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}
