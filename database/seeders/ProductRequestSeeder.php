<?php

namespace Database\Seeders;

use App\Models\ProductRequest;
use Illuminate\Database\Seeder;

class ProductRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductRequest::factory()->times(50)->create();
    }
}
