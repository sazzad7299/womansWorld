<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\CouponSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\WebInfoSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserShippingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            UserShippingSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            CouponSeeder::class,
            ShippingOptionSeeder::class,
            PayOptionSeeder::class,
            OrderSeeder::class,
            WebInfoSeeder::class,
        ]);
    }
}
