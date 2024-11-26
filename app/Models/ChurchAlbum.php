<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_title'
    ];

    public function photos()
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }

}
