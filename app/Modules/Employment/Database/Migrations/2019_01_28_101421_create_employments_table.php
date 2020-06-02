<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('employee_id')->nullable();
            $table->text('first_name');
            $table->string('middle_name')->nullable();
            $table->text('last_name');
            $table->string('full_name')->nullable();  
            $table->text('profile_pic')->nullable();
            $table->text('citizen_pic')->nullable();
            $table->text('cv_pic')->nullable();
            $table->text('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile_2')->nullable();
            $table->text('address')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('designation_id');
            $table->integer('department_id');
            $table->text('join_date')->nullable();
            $table->string('nepali_join_date')->nullable();
            $table->text('personal_email')->nullable();
            $table->text('gender')->nullable();
            $table->text('dob')->nullable();
            $table->integer('blood_group')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('cast_ethnic')->nullable();
            $table->integer('salutation_title')->nullable();
            $table->boolean('martial_status')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('is_user_access')->default(0);
            $table->boolean('is_parent_link')->default(0);
            $table->mediumText('archive_reason')->nullable();
            $table->decimal('salary', 8, 2)->nullable();
            $table->decimal('other_allowance', 8, 2)->nullable();
            $table->decimal('daily_allowance', 8, 2)->nullable();
            $table->decimal('pan_no', 8, 2)->nullable();
            $table->decimal('ss_no', 8, 2)->nullable();
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
        Schema::dropIfExists('employments');
    }
}
