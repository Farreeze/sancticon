<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'church_id',
        'title',
        'desc',
        'date',
        'start_time',
        'end_time',
        'photo_id'
    ];
}
