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
        'photo_id'
    ];

    public function sacrament()
    {
        return $this->belongsTo(LibSacrament::class, 'sacrament_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Ulid::generate();
        });
    }
}
