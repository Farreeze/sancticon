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
            ['id' => '1', 'desc' => 'BAPTISM'],
            ['id' => '2', 'desc' => 'CONFIRMATION'],
            ['id' => '3', 'desc' => 'EUCHARIST'],
            ['id' => '4', 'desc' => 'CONFESSION'],
            ['id' => '5', 'desc' => 'ANOINTING OF THE SICK'],
            ['id' => '6', 'desc' => 'HOLY ORDERS'],
            ['id' => '7', 'desc' => 'MATRIMONY']
        ],['id']);
    }
}
