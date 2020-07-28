<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilesDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     * Inserting 2 data into the file_models table
     * @return void
     */
    public function run()
    {
        DB::table("file_models")->insert([
            [
                "access_level" => 1,
                "file_name" => "Dummy_admin_pdf",
                "file_link" => "https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "access_level" => 1,
                "file_name" => "Dummy_user_pdf",
                "file_link" => "https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "access_level" => 2,
                "file_name" => "Dummy_user_pdf",
                "file_link" => "https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
