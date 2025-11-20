<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecifikationsPlaylists extends Model
{
    protected $table = 'specifikations_playlists';

    protected $fillable = [
        'id_spec',
        'id_play',
    ];
}
