<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueType extends Model
{
    protected $table = "venue_type";

    protected $fillable = [
        'name'
    ];
}
