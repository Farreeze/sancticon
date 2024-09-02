<?php

namespace Database\Seeders;

use App\Models\LibBarangay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LibBarangay::upsert([
            ['id' => '1', 'desc' => 'Tarlac City'],
            ['id' => '2', 'desc' => 'Asturias'],
            ['id' => '3', 'desc' => 'Bantog'],
            ['id' => '4', 'desc' => 'Cut-cut'],
            ['id' => '5', 'desc' => 'Lourdes'],
            ['id' => '6', 'desc' => 'Balete'],
            ['id' => '7', 'desc' => 'DPCH'],
            ['id' => '8', 'desc' => 'Mapalacsiao'],
        ],['id']);
    }
}
