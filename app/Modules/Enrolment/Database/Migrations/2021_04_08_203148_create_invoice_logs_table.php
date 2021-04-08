<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('enrolment_id');
            $table->integer('student_id');
            $table->string('full_name');
            $table->text('subject');
            $table->text('description');
            $table->string('redirect_url');
            $table->text('end_line');
            $table->string('invoice_file')->comment('path: public/invoices')->nullable();
            $table->boolean('status')->default(0)->comment('0-mail not sent; 1 - mail sent');
            
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
        Schema::dropIfExists('invoice_logs');
    }
}
