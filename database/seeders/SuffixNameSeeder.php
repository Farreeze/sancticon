<?php

namespace Database\Seeders;

use App\Models\LibSuffixName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuffixNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LibSuffixName::upsert([
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
        ],['id']);
    }
}
