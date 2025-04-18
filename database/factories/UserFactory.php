<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'superadmin' => 0,
            'main_church' => 1,
            'sub_church' => 0,
            'user' => 0,
            'church_name' => 'Our Lady Of Lourdes Parish (Tarlac City)',
            'first_name' => 'Admin',
            'last_name' => null,
            'middle_name' => null,
            'address' => 'Tarlac City',
            'email' => 'admin@mainchurch.com',
            'mobile_number' => "09123123123",
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ];
    }

    public function AsturiasChurch()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'Asturias Chapel (Brgy. Asturias)',
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'address' => "Brgy. Asturias",
            'email' => 'asturiaschapel@chapel.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function BantogChurch()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'Sacred Heart of Jesus Chapel (Brgy. Bantog)',
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'address' => "Brgy. Bantog",
            'email' => 'sacredheart@chapel.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function CutCutChurch()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'Divine Mercy Shrine and Apostolate Centre (Brgy. Cut-Cut)',
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'address' => "Brgy. Cut-Cut",
            'email' => 'divinemercy@chapel.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function LourdesChurch()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'Lourdes Chapel (Brgy. Lourdes)',
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'address' => "Brgy. Lourdes",
            'email' => 'lourdeschapel@chapel.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function BaleteChurch()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'San Isidro Labrador Chapel (Brgy. Balete)',
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'address' => "Brgy. Balete",
            'email' => 'sanisidro@chapel.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function DPCHChurch()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'Sto. Niño Parish Church (DPCH)',
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'address' => "DPCH",
            'email' => 'stnino@chapel.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function MapalacsiaoChurch()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'Immaculate Conception Parish (Mapalacsiao)',
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null,
            'address' => "Brgy. Mapalacsiao",
            'email' => 'conceptionparish@chapel.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function NormalUser()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 0,
            'main_church' => 0,
            'sub_church' => 0,
            'user' => 1,
            'church_name' => null,
            'first_name' => 'Jae',
            'last_name' => 'Parazo',
            'middle_name' => 'Panlaqui',
            'suffix_name' => null,
            'gender' => 1,
            'address' => 'Malapacsiao Tarlac',
            'email' => 'jae@example.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('test'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function SuperadminUser()
    {
        return $this->state(fn (array $attributes) => [
            'superadmin' => 1,
            'main_church' => 0,
            'sub_church' => 0,
            'user' => 0,
            'church_name' => null,
            'first_name' => 'SUPERADMIN',
            'last_name' => 'SUPERADMIN',
            'middle_name' => 'SUPERADMIN',
            'suffix_name' => null,
            'gender' => 1,
            'address' => 'SUPERADMIN',
            'email' => 'superadmin@superadmin.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('test'),
            'remember_token' => Str::random(10),
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
