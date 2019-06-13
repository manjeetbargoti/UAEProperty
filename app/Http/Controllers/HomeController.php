<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Property;
use App\PropertyType;
use App\PropertyImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Homepage Controller
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->get();
        $properties = json_decode(json_encode($properties));

        foreach($properties as $key => $val){
            $prop_image_count = PropertyImage::where(['property_id' => $val->id])->count();
            if($prop_image_count > 0){
                $prop_image = PropertyImage::where(['property_id' => $val->id])->first();
                $properties[$key]->image_name = $prop_image->image_name;
            }
            $city_count = City::where(['id'=> $val->city])->count();
            if($city_count > 0){
                $city_name = City::where(['id'=> $val->city])->first();
                $properties[$key]->city_name = $city_name->name;
            }
            $state_count = State::where(['id'=> $val->state])->count();
            if($state_count > 0){
                $state_name = State::where(['id'=> $val->state])->first();
                $properties[$key]->state_name = $state_name->name;
            }
        }

        return view('homepage', compact('properties'));
    }

    // View Signle Property Detail Page
    public function singleProperty(Request $request, $url=null)
    {
        $property = Property::where('url', $url)->get();
        $property = json_decode(json_encode($property));

        foreach($property as $key => $val){
            $city_count = City::where(['id'=> $val->city])->count();
            if($city_count > 0){
                $city_name = City::where(['id'=> $val->city])->first();
                $property[$key]->city_name = $city_name->name;
            }
            $state_count = State::where(['id'=> $val->state])->count();
            if($state_count > 0){
                $state_name = State::where(['id'=> $val->state])->first();
                $property[$key]->state_name = $state_name->name;
            }
        }

        $property_image = PropertyImage::get();

        return view('frontend.property.single_property', compact('property', 'property_image'));
    }

    // Property Category Page Function
    public function propertyCategory($url=null)
    {
        $property_type_code = PropertyType::where('url', $url)->get();
        $properties = Property::where('property_type', $property_type_code[0]->type_code)->orderBy('created_at', 'desc')->get();
        // echo "<pre>"; print_r($properties); die;

        return view('frontend.property.property_category', compact('properties'));
    }

    // Property by Buy/Rent/Off Plan function
    public function propertyFor($id=null)
    {
        $properties = Property::where('property_for', $id)->orderBy('created_at', 'desc')->get();
        return view('frontend.property.property_category', compact('properties'));
    }
}
