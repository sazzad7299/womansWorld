<?php

namespace Database\Factories;

use App\Models\WebInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebInfoFactory extends Factory
{
    protected $model = WebInfo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => $this->faker->imageUrl(),
            'icon' => $this->faker->imageUrl(),
            'name' => $this->faker->company(),
            'title' => $this->faker->sentence(),
            'about' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
            'number' => $this->faker->phoneNumber(),
        ];
    }
}
