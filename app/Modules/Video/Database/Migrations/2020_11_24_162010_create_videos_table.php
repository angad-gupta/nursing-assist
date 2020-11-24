<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('video_title')->nullable();
            $table->text('short_content')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnail_image')->nullable();
            $table->integer('is_youtube_image')->nullable();
            $table->string('youtube_id')->nullable();
            $table->text('video_path')->nullable();
            $table->string('status')->nullable();
            $table->date('date')->nullable();

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
        Schema::dropIfExists('videos');
    }
}