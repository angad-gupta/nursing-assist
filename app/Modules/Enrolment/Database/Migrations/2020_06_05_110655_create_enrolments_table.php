<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->nullable();
            $table->integer('courseinfo_id')->nullable();
            $table->boolean('is_eligible_mcq_osce')->default(0);
            $table->boolean('is_eligible_att')->default(0);
            $table->boolean('is_eligible_letter_ahpra')->default(0);
            $table->text('eligible_document')->nullable();
            
            $table->boolean('is_id')->default(0);
            $table->text('identity_document')->nullable();

            $table->string('company_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('country')->nullable();
            $table->text('message')->nullable();

            $table->string('payment_status')->nullable();

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
        Schema::dropIfExists('enrolments');
    }
}