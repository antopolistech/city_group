<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisterConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sister_cons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sister_name');
            $table->string('started_type');
            $table->string('sister_year');
            $table->text('sister_image');
            $table->text('sister_functionality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sister_cons');
    }
}
