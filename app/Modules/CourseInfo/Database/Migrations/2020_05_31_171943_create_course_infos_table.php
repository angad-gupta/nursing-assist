<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_infos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->nullable();
            $table->text('course_program_title')->nullable();
            $table->text('course_program_sub_title')->nullable();
            $table->text('course_duration_period')->nullable();
            $table->text('course_intake_title')->nullable();
            $table->text('short_content')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->text('image_path')->nullable();
            $table->string('youtube_id')->nullable();

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
        Schema::dropIfExists('course_infos');
    }
}
