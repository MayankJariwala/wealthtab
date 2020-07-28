<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "name" => "Mayank",
                "email" => "mayankjariwala1994@gmail.com",
                "access_level" => 2,
                "email_verified_at" => date("Y-m-d H:i:s"),
                "password" => Hash::make("mayank123"),
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "name" => "Admin",
                "email" => "admin@wealthta.com",
                "access_level" => 1,
                "email_verified_at" => date("Y-m-d H:i:s"),
                "password" => Hash::make("admin123"),
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
