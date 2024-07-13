<?php

namespace Database\Seeders;

use App\Models\LibSacrament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SacramentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LibSacrament::upsert([
            ['id' => '1', 'desc' => 'Sacrament1'],
            ['id' => '2', 'desc' => 'Sacrament2'],
            ['id' => '3', 'desc' => 'Sacrament3'],
            ['id' => '4', 'desc' => 'Sacrament4'],
            ['id' => '5', 'desc' => 'Sacrament5']
        ],['id']);
    }
}
