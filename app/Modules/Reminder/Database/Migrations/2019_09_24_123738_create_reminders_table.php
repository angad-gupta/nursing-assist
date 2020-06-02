<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->integer('reminder_type')->nullable();
            $table->longText('note')->nullable();
            $table->longText('additional_notes')->nullable();
            $table->text('remind_date')->nullable();
            $table->integer('is_remind_range')->default(0);
            $table->text('remind_from')->nullable();
            $table->text('remind_to')->nullable();
            $table->integer('remind_before')->nullable();
            $table->integer('repeat_type');
            $table->text('next_repeat_date')->nullable();
            $table->integer('priority')->default(0);
            $table->integer('created_by');
            $table->integer('status')->default(0);
            
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
        Schema::dropIfExists('reminders');
    }
}
