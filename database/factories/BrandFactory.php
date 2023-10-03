<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();
        $slug = Str::slug($name);

    // Generate and store logo
        $logo = UploadedFile::fake()->image('category.jpg');
        $path = Storage::putFile('public/images/categories', $logo);
        return [
                'name' => $name,
                'slug' => $slug,
                'logo' =>$path,
                'status' => rand(0, 1),
        ];
    }
}
