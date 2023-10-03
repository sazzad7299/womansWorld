<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ProductRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductRequestFactory extends Factory
{
    protected $model = ProductRequest::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        return [
            'name' => $this->faker->name,
            'user_id' => $user->id,
            'quantity'=> rand(1,10),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
