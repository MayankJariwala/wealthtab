<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAccessLevelSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("user_level_models")->insert([
            [
                "access_name" => "admin",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "access_name" => "user",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
