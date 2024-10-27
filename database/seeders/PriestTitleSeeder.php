<?php

namespace Database\Seeders;

use App\Models\LibPriestTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriestTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        LibPriestTitle::upsert([
            ['id' => '1', 'desc' => 'Parish Priest'],
            ['id' => '2', 'desc' => 'Parochial Priest']
        ],['id']);
    }
}
