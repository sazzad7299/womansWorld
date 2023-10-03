<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use App\Models\PayOption;
use App\Models\OrderDetail;
use App\Models\ShippingOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $ShippingOption = ShippingOption::inRandomOrder()->first();
        $payoption = PayOption::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'shipping_address' => $this->faker->address,
            'billing_info' => $this->faker->text,
            'pay_options_id' => $payoption->id,
            'delivery_status' => $this->faker->randomElement([0, 1, 2, 3, 4, 5]),
            'shipping_options_id' => $ShippingOption->id,
            'payment_status' => $this->faker->randomElement([0, 1, 2, 3, 4]),
            'grand_total' => $this->faker->randomFloat(2, 10, 500),
            'total' => $this->faker->randomFloat(2, 10, 500),
            'coupon_discount' => $this->faker->randomFloat(2, 1, 50),
            'code' => $this->faker->word,
            'tracking_code' => $this->faker->word,
            'date' => $this->faker->date(),
            'viewed' => $this->faker->randomElement([0, 1]),
            'delivery_viewed' => $this->faker->randomElement([0, 1]),
            'payment_status_viewed' => $this->faker->randomElement([0, 1]),
            'shipping_charge' => $this->faker->randomFloat(2, 1, 10),
            'status' => $this->faker->randomElement([0, 1, 2]),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $order->orderDetails()->saveMany(OrderDetail::factory()->count(3)->make());
        });
    }
}
