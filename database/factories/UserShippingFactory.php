<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserShipping;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserShippingFactory extends Factory
{
    protected $model = UserShipping::class;

    public function definition()
    {
       $user = User::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'name' => $this->faker->name,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'apartment' => $this->faker->secondaryAddress,
            'zip' => $this->faker->postcode,
            'thana' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}

