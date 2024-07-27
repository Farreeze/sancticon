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
            $table->ulid('id')->primary();
            $table->foreignId('event_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('church_events');
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
