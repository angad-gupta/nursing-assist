<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressFieldsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('street_number')->nullable()->after('phone_no');
            $table->string('street_name')->nullable()->after('street_number');
            $table->string('suburb')->nullable()->after('street_name');
            $table->string('postalcode')->nullable()->after('suburb');
            $table->string('state')->nullable()->after('postalcode');        
            $table->integer('country_id')->nullable()->after('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('street_number');
            $table->dropColumn('street_name');
            $table->dropColumn('suburb');
            $table->dropColumn('postalcode');
            $table->dropColumn('state');            
            $table->dropColumn('country');
        });
    }
}
