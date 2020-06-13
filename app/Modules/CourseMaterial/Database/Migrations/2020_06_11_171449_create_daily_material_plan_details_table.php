<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyMaterialPlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_material_plan_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('daily_material_plan_id')->nullable();
            $table->text('subject_title')->nullable();
            $table->string('topic_type')->nullable();
            $table->string('video_id')->nullable();
            $table->text('pdf_path')->nullable();

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
        Schema::dropIfExists('daily_material_plan_details');
    }
}