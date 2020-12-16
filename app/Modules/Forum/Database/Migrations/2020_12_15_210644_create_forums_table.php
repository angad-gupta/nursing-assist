<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');

            $table->text('forum_title')->nullable();
            $table->text('forum_description')->nullable();
            $table->integer('posted_by')->nullable();
            $table->date('posted_date')->nullable();
            $table->boolean('is_top_topic')->default(0);
            $table->boolean('is_featured_topic')->default(0);

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
        Schema::dropIfExists('forums');
    }
}
