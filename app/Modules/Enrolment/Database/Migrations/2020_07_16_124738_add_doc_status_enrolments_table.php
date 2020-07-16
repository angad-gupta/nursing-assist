<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocStatusEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrolments', function (Blueprint $table) {
            $table->string('status')->default('Pending')->after('payment_status')->comment('Approved; Disapproved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolments', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
