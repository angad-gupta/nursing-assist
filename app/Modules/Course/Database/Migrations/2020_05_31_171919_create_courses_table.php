<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');

            $table->text('title')->nullable();
            $table->text('title_of_training')->nullable();
            $table->text('course_duration')->nullable();
            $table->text('mode_of_delivery')->nullable();
            $table->text('intake_dates')->nullable();
            $table->text('course_fees')->nullable();
            $table->text('short_content')->nullable();
            $table->text('description')->nullable();
            $table->text('enrollment_process')->nullable();
            $table->text('important_course')->nullable();
            $table->text('image')->nullable();

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
        Schema::dropIfExists('courses');
    }
}
