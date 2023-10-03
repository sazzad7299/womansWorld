<?php

namespace Database\Factories;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name;
        $slug = Str::slug($name, '-');
        $category = Category::inRandomOrder()->first();
        $brand = Brand::inRandomOrder()->first();
        $image = UploadedFile::fake()->image('product.jpg');
        $path = Storage::putFile('public/images', $image);
        $discountType = $this->faker->numberBetween(0, 2);
        $discount = $discountType === 0 ? null : $this->faker->numberBetween(1, 90);
        return [
            'name' => $name,
            'slug' => Product::whereSlug($slug)->exists() ? ($slug . '-' . uniqid()) : $slug,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'old_price' => $this->faker->randomFloat(2, 100, 500),
            'status' => rand(0, 4),
            'tags' => implode(',', $this->faker->words(3)),
            'description' => $this->faker->paragraph(),
            'display' => $path,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'discount_type' => $discountType,
            'discount' => $discount,
        ];
    }
}
