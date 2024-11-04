<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\Uid\Ulid;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'superadmin',
        'main_church',
        'sub_church',
        'user',
        'first_name',
        'last_name',
        'middle_name',
        'suffix_name',
        'gender',
        'church_name',
        'fixed_address',
        'address',
        'email',
        'mobile_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function suffix()
    {
        return $this->belongsTo(libSuffixName::class, 'suffix_name', 'id');
    }

    public function barangay()
    {
        return $this->belongsTo(LibBarangay::class, 'fixed_address', 'id');
    }

}
