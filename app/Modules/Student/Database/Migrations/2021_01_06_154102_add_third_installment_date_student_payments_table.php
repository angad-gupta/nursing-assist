<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThirdInstallmentDateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            $table->date('final_installment_date')->nullable()->after('course_start_date');
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
            $table->dropColumn('final_installment_date');
        });
    }
}
