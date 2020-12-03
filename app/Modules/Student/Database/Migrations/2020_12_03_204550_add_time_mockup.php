<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeMockup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_mockup_results', function (Blueprint $table) {    
            $table->dateTime('start_time', 0)->nullable()->after('percent');
            $table->dateTime('break_time', 0)->nullable()->after('percent');
            $table->dateTime('end_time', 0)->nullable()->after('percent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_mockup_results', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('break_time');
            $table->dropColumn('end_time');
        });
    }
}
