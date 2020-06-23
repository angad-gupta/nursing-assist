<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_plans', function (Blueprint $table) {
            $table->increments('id');

             $table->integer('course_content_id')->nullable();
             $table->string('course_session')->nullable();
             $table->text('plan_description')->nullable();
             $table->string('plan_type')->nullable();
             $table->string('plan_path')->nullable();

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
        Schema::dropIfExists('course_plans');
    }
}