<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    //
    protected $fillable = [
        'name', 'amenity_code', 'description', 'status'
    ];
}
