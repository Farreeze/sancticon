<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priest extends Model
{
    use HasFactory;

    protected $fillable = [
        'church_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix_name',
        'title',
        'photo_id',
    ];

    public function church()
    {
        return $this->belongsTo(User::class, 'church_id', 'id');
    }

    public function suffix()
    {
        return $this->belongsTo(libSuffixName::class, 'suffix_name', 'id');
    }
}
