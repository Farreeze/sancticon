<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SacramentRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'sacrament_desc',
        'desc'
    ];
}
