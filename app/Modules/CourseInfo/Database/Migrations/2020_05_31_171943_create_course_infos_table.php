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
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->text('image_path')->nullable();
            $table->string('youtube_id')->nullable();
            $table->string('tuition_fee')->nullable();

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
