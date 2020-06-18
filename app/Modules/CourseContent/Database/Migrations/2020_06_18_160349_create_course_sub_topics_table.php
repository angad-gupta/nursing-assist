<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSubTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sub_topics', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_plan_id')->nullable();
            $table->string('sub_topic_title')->nullable();
            $table->text('sub_topic_description')->nullable();
            $table->string('sub_topic_type')->nullable();
            $table->string('sub_topic_path')->nullable();


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
        Schema::dropIfExists('course_sub_topics');
    }
}