<?php

namespace Database\Factories;

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
            'main_church' => 1,
            'sub_church' => 0,
            'user' => 0,
            'church_name' => 'main church',
            'address' => 'test address only',
            'email' => 'main_church@example.com',
            'mobile_number' => "09123123123",
            'password' => Hash::make('test'),
            'remember_token' => Str::random(10),
        ];
    }

    public function subChurchUser()
    {
        return $this->state(fn (array $attributes) => [
            'main_church' => 0,
            'sub_church' => 1,
            'user' => 0,
            'church_name' => 'sub church',
            'address' => 'another test address',
            'email' => 'sub_church@example.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('test'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function NormalUser()
    {
        return $this->state(fn (array $attributes) => [
            'main_church' => 0,
            'sub_church' => 0,
            'user' => 1,
            'church_name' => null,
            'first_name' => 'Alieu Farreeze',
            'last_name' => 'Arcilla',
            'middle_name' => 'Nabong',
            'suffix_name' => null,
            'gender' => 1,
            'address' => 'another test address',
            'email' => 'user@example.com',
            'mobile_number' => "09123456789",
            'password' => Hash::make('test'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function NormalUserOne()
    {
        return $this->state(fn (array $attributes) => [
            'main_church' => 0,
            'sub_church' => 0,
            'user' => 1,
            'church_name' => null,
            'first_name' => 'Clarisa Billie Anne',
            'last_name' => 'Capili',
            'middle_name' => 'Manarang',
            'suffix_name' => null,
            'gender' => 1,
            'address' => 'another test address',
            'email' => 'user1@example.com',
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
