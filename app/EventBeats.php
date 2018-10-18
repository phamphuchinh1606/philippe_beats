<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBeats extends Model
{
    protected $table = "event_beats";

    protected $fillable = [
        'points', 'comments'
    ];
}
