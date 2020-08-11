<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->nullable();
            $table->integer('courseinfo_id')->nullable();
            $table->integer('enrolment_payment_id')->nullable();
            $table->string('status')->nullable()->comment('Pending; Paid; First Intallment Paid; Second Installment Paid; Final Installment Paid');
            $table->boolean('moved_to_student')->default(0);

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
        Schema::dropIfExists('student_payments');
    }
}
