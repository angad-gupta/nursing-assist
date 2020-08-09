<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPaymentInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payment_installments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_payment_id')->nullable();
            $table->integer('enrolment_payment_id')->nullable();
            $table->double('installment_amt', 20, 2)->nullable();
            $table->boolean('status')->default(0)->comment('0-unpaid; 1-paid');
            
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
        Schema::dropIfExists('student_payment_installments');
    }
}
