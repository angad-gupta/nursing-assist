<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMockupResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_mockup_results', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->nullable();
            $table->date('date')->nullable();
            $table->string('mockup_title')->nullable();
            $table->double('total_question',10)->nullable();
            $table->double('correct_answer',10)->nullable();
            $table->double('percent')->nullable();

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
        Schema::dropIfExists('student_mockup_results');
    }
}
