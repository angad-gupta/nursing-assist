<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusCourseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_infos', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('students_per_intake')->comment('0-inactive; 1-active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_infos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
