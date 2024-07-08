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
        Schema::create('church_certificate_requests', function (Blueprint $table) {
            $table->id();
            $table->ulid('church_id');
            $table->string('cert_name');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('church_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('church_certificate_requests');
    }
};
