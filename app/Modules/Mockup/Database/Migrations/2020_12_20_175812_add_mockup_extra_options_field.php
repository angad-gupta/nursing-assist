<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMockupExtraOptionsField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mockups', function (Blueprint $table) {
            $table->string('option_5')->nullable()->after('option_4');
            $table->string('option_6')->nullable()->after('option_4');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('mockups', function (Blueprint $table) {
            $table->dropColumn('option_5');
            $table->dropColumn('option_6');
        });
    }
}
