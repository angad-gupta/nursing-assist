<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPracticeResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_practice_results', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->nullable();
            $table->date('date')->nullable();
            $table->string('title')->nullable();
            $table->integer('total_question')->nullable();
            $table->integer('total_attempted_question')->nullable();
            $table->double('correct_answer',10)->nullable();
            $table->double('percent')->nullable();
            $table->dateTime('start_time', 0)->nullable();
            $table->dateTime('break_time', 0)->nullable();
            $table->dateTime('end_time', 0)->nullable();
            
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
        Schema::dropIfExists('student_practice_results');
    }
}
