<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudentPaymentField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            $table->string('total_course_fee')->after('moved_to_student')->nullable();
            $table->string('amount_paid')->after('moved_to_student')->nullable();
            $table->string('amount_left')->after('moved_to_student')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            $table->dropColumn('total_course_fee');
            $table->dropColumn('amount_paid');
            $table->dropColumn('amount_left');
        });
    }
}
