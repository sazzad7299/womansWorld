<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PayOption;
use Illuminate\Database\Seeder;

class PayOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_time = Carbon::now()->format('Y-m-d H:i:s');
        $payment_methods = [
            [
                "name" => 'COD',
                "type" => 'cod',
                "account" => 'cod',
                "status" => 1,
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "name" => 'bKash',
                "type" => 'Agent',
                "account" => '92379792324',
                "status" => 1,
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "name" => 'Rocket',
                "type" => 'Personal',
                "account" => '923740924',
                "status" => 1,
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "name" => 'Nagad',
                "type" => 'Marchent',
                "account" => '937598634',
                "status" => 1,
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "name" => 'Upay',
                "type" => 'Marchent',
                "account" => '937598634',
                "status" => 1,
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "name" => 'Bank',
                "type" => 'Marchent',
                "account" => '937598634',
                "status" => 1,
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "name" => 'Card',
                "type" => 'Marchent',
                "account" => '937598634',
                "status" => 1,
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
        ];
        PayOption::insert($payment_methods);
    }
}
