<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lib_suffix_names', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->timestamps();
        });

        DB::table('lib_suffix_names')->insert([
            ['id' => '1',     'desc' => 'Jr.'],
            ['id' => '2',     'desc' => 'Sr.'],
            ['id' => '3',     'desc' => 'II'],
            ['id' => '4',     'desc' => 'III'],
            ['id' => '5',     'desc' => 'IV'],
            ['id' => '6',     'desc' => 'V'],
            ['id' => '7',     'desc' => 'VI'],
            ['id' => '8',     'desc' => 'VII'],
            ['id' => '9',     'desc' => 'VIII'],
            ['id' => '10',    'desc' => 'N/A'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lib_suffix_names');
    }
};
