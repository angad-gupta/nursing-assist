<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_materials', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_info_id')->nullable();
            $table->string('material_title')->nullable();
            $table->text('short_content')->nullable();
            $table->text('description')->nullable();
            $table->text('material_image')->nullable();
            $table->string('image_fade_color')->nullable();
            $table->string('image_caption')->nullable();
            $table->string('image_icon')->nullable();

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
        Schema::dropIfExists('course_materials');
    }
}
