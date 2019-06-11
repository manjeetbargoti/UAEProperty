<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Property extends Model
{
    use Sluggable;
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'url' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', 'url', 'property_for', 'property_type', 'description', 'property_code', 'property_price', 'featured',
        'property_area', 'property_facing', 'transection_type', 'construction_status', 'rooms', 'bedrooms', 'bathrooms',
        'parking', 'furnish_type', 'p_washrooms', 'cafeteria', 'property_age', 'commercial', 'amenities', 'unitno', 'addressline1',
        'addressline2', 'locality', 'country', 'state', 'city', 'postalcode', 'add_by'
    ];
}
