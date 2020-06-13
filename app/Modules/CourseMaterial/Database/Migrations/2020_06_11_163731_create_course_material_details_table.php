<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMaterialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_material_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('couse_material_id')->nullable();
            $table->string('material_topic')->nullable();
            $table->string('course_schedule')->nullable();
            $table->text('topic_summary')->nullable();

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
        Schema::dropIfExists('course_material_details');
    }
}