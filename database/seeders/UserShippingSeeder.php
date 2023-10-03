<?php

namespace Database\Seeders;

use App\Models\UserShipping;
use Illuminate\Database\Seeder;

class UserShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserShipping::factory(10)->create();
    }
}
