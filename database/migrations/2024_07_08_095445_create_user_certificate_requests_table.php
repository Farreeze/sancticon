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
        Schema::create('user_certificate_requests', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('user_id');
            $table->foreignId('event_id');
            $table->foreignId('sacrament_id');
            $table->boolean('status')->nullable(); // 0 == pending
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('church_events');
            $table->foreign('sacrament_id')->references('id')->on('lib_sacraments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_certificate_requests');
    }
};
