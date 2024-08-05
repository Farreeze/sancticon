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
        'church_id',
        'sacrament_id',
        'date',
        'first_name',
        'second_name',
        'subchurch_approve',
        'status'
    ];

    public function sacrament()
    {
        return $this->belongsTo(LibSacrament::class, 'sacrament_id', 'id');
    }

    public function church()
    {
        return $this->belongsTo(User::class, 'church_id', 'id');
    }

}
