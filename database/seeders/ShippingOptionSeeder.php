<?php

namespace Database\Seeders;

use App\Models\ShippingOption;
use Illuminate\Database\Seeder;

class ShippingOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingOption::factory()->times(4)->create();
    }
}
