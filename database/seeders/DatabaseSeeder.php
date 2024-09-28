<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            GenderSeeder::class,
            SuffixNameSeeder::class,
            SacramentSeeder::class,
            BarangaySeeder::class
        ]);
        User::factory()->create();
        User::factory()->AsturiasChurch()->create();
        User::factory()->BantogChurch()->create();
        User::factory()->CutCutChurch()->create();
        User::factory()->LourdesChurch()->create();
        User::factory()->BaleteChurch()->create();
        User::factory()->DPCHChurch()->create();
        User::factory()->MapalacsiaoChurch()->create();
        User::factory()->NormalUser()->create();
        User::factory()->NormalUserOne()->create();
        User::factory()->SuperadminUser()->create();
    }
}
