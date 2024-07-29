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
        Schema::create('church_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sacrament_id')->nullable();
            $table->foreignId('church_id');
            $table->string('title');
            $table->text('desc');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('status')->default(1); // 1 == active
            $table->string('location');
            $table->timestamps();

            $table->foreign('sacrament_id')->references('id')->on('lib_sacraments');
            $table->foreign('church_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('church_events');
    }
};
