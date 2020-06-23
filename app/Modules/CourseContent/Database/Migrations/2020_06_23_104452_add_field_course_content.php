<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldCourseContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('course_contents', function (Blueprint $table) {
            $table->boolean('is_related_to_quiz')->after('lesson_summary')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('course_contents', function (Blueprint $table) {
            $table->dropColumn('is_related_to_quiz');
        });
    }
}
