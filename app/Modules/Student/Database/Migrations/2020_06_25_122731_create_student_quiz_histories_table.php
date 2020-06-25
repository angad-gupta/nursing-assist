<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentQuizHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_quiz_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->nullable();
            $table->integer('courseinfo_id')->nullable();
            $table->integer('quiz_id')->nullable();
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
        Schema::dropIfExists('student_quiz_histories');
    }
}
