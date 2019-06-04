<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    // Fillable Values
    protected $fillable = [
        'name', 'type_code', 'url', 'description', 'status'
    ];
}
