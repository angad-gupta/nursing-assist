<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enrolment_id')->nullable();
            $table->text('transactionID')->nullable();
            $table->string('totalAmount')->nullable();
            $table->string('tokenCustomerID')->nullable();
            $table->longtext('customer')->nullable();
            $table->longtext('shippingAddress')->nullable();
            $table->boolean('sucess')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolment_payment');
    }
}
