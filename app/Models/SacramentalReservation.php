<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class SacramentalReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sacrament_id',
        'date',
        'first_name',
        'second_name'
    ];

}
