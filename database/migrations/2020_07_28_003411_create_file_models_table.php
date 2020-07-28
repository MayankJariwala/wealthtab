<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_models', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("access_level")->unsigned()->comment("Users access level representation");
            $table->string("file_name")->nullable(false)->comment("Represents name of the file");
            $table->string("file_link")->nullable(false)->comment("Represents uploaded ref. link of the file");
            $table->engine = "InnoDB";
            $table->timestamps();
        });
        Schema::table('file_models', function (Blueprint $table) {
            $table->foreign("access_level")
                ->references("id")
                ->on("user_level_models")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_models');
    }
}
