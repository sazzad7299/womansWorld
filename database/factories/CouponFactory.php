<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amountType = $this->faker->numberBetween(1, 2);
        $amount = $this->faker->numberBetween(1, $amountType == 1 ? 1000 : 100);
        return [
            'title' => $this->faker->word,
            'details' => $this->faker->paragraph,
            'type' => $this->faker->numberBetween(1, 4),
            'limit' => $this->faker->numberBetween(1, 100),
            'code' => $this->faker->unique()->numberBetween(100000, 999999),
            'amount' => $amount,
            'amount_type' => $amountType,
            'expires_at' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
        ];
    }
}
