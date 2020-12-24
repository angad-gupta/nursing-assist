<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhatOurStudentSaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('what_our_student_says', function (Blueprint $table) {
            $table->increments('id');

            $table->text('profile_pic')->nullable();
            $table->string('student_name')->nullable();
            $table->string('designation')->nullable();
            $table->text('message')->nullable();

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
        Schema::dropIfExists('what_our_student_says');
    }
}


