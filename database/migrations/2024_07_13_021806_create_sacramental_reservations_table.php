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
            $table->foreignId('sacrament_id');
            $table->date('date');
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->timestamps();

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
