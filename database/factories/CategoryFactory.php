<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // Generate and store logo
        $logo = UploadedFile::fake()->image('category.jpg');
        $path = Storage::putFile('public/images/categories', $logo);

        // Create parent category with 50% probability
        $parent = null;
        if (rand(0, 1)) {
            $parent = Category::inRandomOrder()->first();
            if (!$parent) {
                $parent = Category::factory()->create();
            }
        }

        return [
            'name' => $this->faker->word(),
            'slug' => Str::slug('name'),
            'logo' => $path,
            'status' => rand(0, 1),
            'parent_id' => $parent ? $parent->id : null,
        ];
    }
}
