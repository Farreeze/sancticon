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
        'start_time',
        'end_time',
        'participant_name',
        'first_name',
        'second_name',
        'custom_name',
        'custom_number',
        'file_one',
        'file_two',
        'file_three',
        'file_four',
        'subchurch_approve',
        'feedback',
        'priest_name',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sacrament()
    {
        return $this->belongsTo(LibSacrament::class, 'sacrament_id', 'id');
    }

    public function church()
    {
        return $this->belongsTo(User::class, 'church_id', 'id');
    }

}
