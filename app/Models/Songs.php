<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    protected $table = 'songs';

    protected $fillable = [
        'title',
        'path',
        'playlist_id',
    ];
}
