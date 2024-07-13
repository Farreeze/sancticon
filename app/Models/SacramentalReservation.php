<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Ulid;

class SacramentalReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Ulid::generate();
        });
    }
}
