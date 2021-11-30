<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation')->nullable();
            $table->string('vacancy')->nullable();
            $table->text('job_description')->nullable();
            $table->string('job_nature')->nullable();
            $table->text('educational_req')->nullable();
            $table->text('professional_certificate')->nullable();
            $table->text('experience_req')->nullable();
            $table->text('job_req')->nullable();
            $table->text('job_location')->nullable();
            $table->text('salary_range')->nullable();
            $table->text('other_benefit')->nullable();
            $table->date('published_on')->nullable();
            $table->date('deadline')->nullable();
            $table->text('instruction')->nullable();
            $table->text('BD_job_link')->nullable();
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
        Schema::dropIfExists('careers');
    }
}
