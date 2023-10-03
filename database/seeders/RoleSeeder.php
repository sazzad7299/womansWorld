<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =[
            [
                'name'=>"Admin",
                'guard_name'=>"web",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"User",
                'guard_name'=>"web",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Marchant",
                'guard_name'=>"web",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Seller",
                'guard_name'=>"web",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"eStore",
                'guard_name'=>"web",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ];
        Role::insert($role);
    }
}
