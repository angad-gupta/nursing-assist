<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReadinessResultIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('student_readiness_histories', function (Blueprint $table) {    
            $table->integer('readiness_result_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_readiness_histories', function (Blueprint $table) {        
            $table->dropColumn('readiness_result_id');
        });
    }
}
