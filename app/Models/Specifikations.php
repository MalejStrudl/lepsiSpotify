<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specifikations extends Model
{
    protected $table = 'specifikations';

    protected $fillable = [
        'name',
        'importance',
    ];
}
