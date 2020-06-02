<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('main_navbar_color')->nullable();
            $table->text('secondary_navbar_color')->nullable();
            $table->text('page_header_color')->nullable();

            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('website')->nullable();

            $table->string('permanent_address')->nullable();
            $table->string('province_no')->nullable();
            $table->string('district')->nullable();
            $table->string('suburb')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('contact_no1')->nullable();
            $table->string('contact_no2')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('linkin_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('software_type')->nullable();

            $table->integer('pf')->nullable();
            $table->integer('gratuity')->nullable();
            $table->integer('ssf')->nullable();
            $table->integer('ssf_tax')->nullable();
            $table->integer('basic_salary_percentage')->nullable();
            $table->text('bank_account1')->nullable();
            $table->text('bank_account2')->nullable();
            $table->text('bank_name1')->nullable();
            $table->text('bank_name2')->nullable();

            $table->text('softwaretype_title')->nullable();

            $table->decimal('normal_holiday_ot_rate', 4, 2)->default(0)->nullable();
            $table->decimal('special_holiday_ot_rate', 4, 2)->default(0)->nullable();
            $table->decimal('general_ot_rate', 4, 2)->default(0)->nullable();

            $table->string('currency')->default('Rs.')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
