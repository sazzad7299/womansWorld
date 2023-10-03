<?php

namespace Database\Seeders;

use App\Models\WebInfo;
use Illuminate\Database\Seeder;

class WebInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebInfo::factory(1)->create();
    }
}
