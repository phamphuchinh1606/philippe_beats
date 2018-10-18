<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBeats extends Model
{
    protected $table = "user_beats";

    protected $fillable = [
        'points', 'comments'
    ];
}
