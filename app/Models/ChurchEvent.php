<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class ChurchEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'sacrament_id',
        'church_id',
        'title',
        'desc',
        'date',
        'start_time',
        'end_time',
        'location'
    ];

    public function sacrament()
    {
        return $this->belongsTo(LibSacrament::class, 'sacrament_id', 'id');
    }
}
