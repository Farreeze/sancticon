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
        Schema::create('news_and_announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('church_id');
            $table->string('title');
            $table->text('desc');
            $table->date('date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('church_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_and_announcements');
    }
};
