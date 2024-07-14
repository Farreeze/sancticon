<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('church_certificate_requests', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('church_id');
            $table->foreignUlid('event_id');
            $table->foreignId('sacrament_id');
            $table->string('cert_name');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('church_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('church_events');
            $table->foreign('sacrament_id')->references('id')->on('lib_sacraments');
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
