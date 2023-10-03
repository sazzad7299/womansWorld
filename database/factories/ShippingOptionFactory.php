<?php

namespace Database\Factories;

use App\Models\ShippingOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingOptionFactory extends Factory
{
    protected $model = ShippingOption::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->word,
            'details' => $this->faker->sentence,
            'cost' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
