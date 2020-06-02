<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReminderNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_notifies', function (Blueprint $table) {
            $table->increments('id');

            $table->text('title')->nullable();
            $table->string('date')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('display_type');
            $table->integer('status')->default(1);
            $table->string('snoooze_date')->nullable();
            $table->integer('reminder_type');

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
        Schema::dropIfExists('reminder_notifies');
    }
}
