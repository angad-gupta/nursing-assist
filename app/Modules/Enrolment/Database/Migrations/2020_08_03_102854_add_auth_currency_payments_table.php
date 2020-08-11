<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthCurrencyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrolment_payment', function (Blueprint $table) {
            $table->string('authCode')->nullable()->after('transactionID');
            $table->string('currency')->nullable()->after('authCode');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolment_payment', function (Blueprint $table) {
            $table->dropColumn('authCode');
            $table->dropColumn('currency');
        });
    }
}
