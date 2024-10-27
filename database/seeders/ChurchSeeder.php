<?php

namespace Database\Seeders;

use App\Models\LibChurch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChurchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LibChurch::upsert([
            ['id' => '1', 'desc' => 'Asturias Chapel (Brgy. Asturias)'],
            ['id' => '2', 'desc' => 'Sacred Heart of Jesus Chapel (Brgy. Bantog)'],
            ['id' => '3', 'desc' => 'Divine Mercy Shrine and Apostolate Centre (Brgy. Cut-Cut)'],
            ['id' => '4', 'desc' => 'Lourdes Chapel (Brgy. Lourdes)	'],
            ['id' => '5', 'desc' => 'San Isidro Labrador Chapel (Brgy. Balete)'],
            ['id' => '6', 'desc' => 'Sto. Niño Parish Church (DPCH)'],
            ['id' => '7', 'desc' => 'Immaculate Conception Parish (Mapalacsiao)'],
        ],['id']);
    }
}
