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
        Schema::create('priests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('church_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->unsignedBigInteger('suffix_name')->nullable();
            $table->string('title');
            $table->string('photo_id')->nullable();
            $table->timestamps();

            $table->foreign('church_id')->references('id')->on('users');
            $table->foreign('suffix_name')->references('id')->on('lib_suffix_names');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priests');
    }
};
