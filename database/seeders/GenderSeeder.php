<?php

namespace Database\Seeders;

use App\Models\LibGender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LibGender::upsert([
            ['id' => '1', 'desc' => 'Male'],
            ['id' => '2', 'desc' => 'Female']
        ],['id']);
    }
}
