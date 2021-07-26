<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGame extends Model
{
    protected $table = 'video_games';
    protected $fillable = [
        'title',
        'rating',
        'genre',
        'imgUrl',
        'userId'
    ];
    // use HasFactory;
}
