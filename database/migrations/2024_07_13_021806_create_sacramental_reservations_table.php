<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sacramental_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('church_id');
            $table->foreignId('sacrament_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('participant_name')->nullable(); //baptism
            $table->string('first_name')->nullable();   //matrimony
            $table->string('second_name')->nullable();  //matrimony
            $table->string('custom_name')->nullable();  //custome request (for churches)
            $table->boolean('subchurch_approve')->nullable();
            $table->text('feedback')->nullable(); //only when rejected
            $table->string('priest_name')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('church_id')->references('id')->on('users');
            $table->foreign('sacrament_id')->references('id')->on('lib_sacraments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sacramental_reservations');
    }
};
