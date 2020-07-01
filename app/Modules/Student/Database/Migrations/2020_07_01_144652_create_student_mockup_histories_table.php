<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMockupHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_mockup_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->nullable();
            $table->string('mockup_title')->nullable();
            $table->integer('question_id')->nullable();
            $table->string('answer')->nullable();
            $table->boolean('is_correct_answer')->default(0);

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
        Schema::dropIfExists('student_mockup_histories');
    }
}