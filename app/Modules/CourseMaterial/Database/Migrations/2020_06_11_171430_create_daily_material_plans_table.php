<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyMaterialPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_material_plans', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_material_detail_id')->nullable();
            $table->text('plan_title')->nullable();
            $table->text('plan_description')->nullable();

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
        Schema::dropIfExists('daily_material_plans');
    }
}