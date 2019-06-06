<?php

namespace App\Http\Controllers;

use Image;
use App\City;
use App\State;
use App\Amenity;
use App\Country;
use App\Property;
use App\PropertyType;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class PropertyController extends Controller
{
    // Add Property Types
    public function addPropertyType(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            if (!empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            $url = str_slug($data['property_type_name']);

            $property_type = PropertyType::create([
                'name'          => $data['property_type_name'],
                'type_code'     => $data['type_code'],
                'url'           => $url,
                'description'   => $data['description'],
                'status'        => $status
            ]);

            return redirect('/admin/property-type')->with('flash_message_success', 'Property Type Created Successfully!');
        }
        return view('admin.property.add_property_type');
    }

    // View all Property Types
    public function propertyTypes()
    {
        $property_type = PropertyType::orderBy('created_at', 'desc')->get();

        return view('admin.property.property_type', compact('property_type'));
    }

    // Enable Property Type
    public function enablePropertyType($id = null)
    {
        if (!empty($id)) {
            PropertyType::where('id', $id)->update(['status' => 1]);
            return redirect()->back()->with('flash_message_success', 'Property Type Enabled Successfully!');
        }
    }

    // Disable Property Type
    public function disablePropertyType($id = null)
    {
        if (!empty($id)) {
            PropertyType::where('id', $id)->update(['status' => 0]);
            return redirect()->back()->with('flash_message_success', 'Property Type Disabled Successfully!');
        }
    }

    // Add New Property
    public function addProperty(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            // dd($data);
            if (!empty($data['featured'])) {
                $featured = 1;
            } else {
                $featured = 0;
            }

            if (!empty($data['commercial'])) {
                $commercial = 1;
            } else {
                $commercial = 0;
            }

            $amenities = $data['amenity'];
            $amenity = implode(',', $amenities);

            // dd($amenity);

            $property = Property::create([
                'name'                  => $data['property_name'],
                'url'                   => $data['slug'],
                'property_for'          => $data['property_for'],
                'property_type'         => $data['property_type'],
                'property_code'         => $data['property_code'],
                'property_price'        => $data['property_price'],
                'description'           => $data['description'],
                'featured'              => $featured,
                'property_area'         => $data['property_area'],
                'property_facing'       => $data['property_facing'],
                'transection_type'      => $data['transection_type'],
                'construction_status'   => $data['construction_status'],
                'rooms'                 => $data['rooms'],
                'bedrooms'              => $data['bedrooms'],
                'bathrooms'             => $data['bathrooms'],
                'balconies'             => $data['balconies'],
                'furnish_type'          => $data['furnish_type'],
                'p_washrooms'           => $data['p_washroom'],
                'cafeteria'             => $data['cafeteria'],
                'property_age'          => $data['property_age'],
                'commercial'            => $commercial,
                'amenities'             => $amenity,
                'plotno'                => $data['plot_no'],
                'addressline1'          => $data['property_address1'],
                'addressline2'          => $data['property_address2'],
                'locality'              => $data['locality'],
                'country'               => $data['country'],
                'state'                 => $data['state'],
                'city'                  => $data['city'],
                'postalcode'            => $data['zipcode'],
                'add_by'                => Auth::user()->id
            ]);

            // Upload image
            if ($request->hasFile('file')) {
                $image_array = Input::file('file');
                // if($image_array->isValid()){
                $array_len = count($image_array);
                for ($i = 0; $i < $array_len; $i++) {
                    // $image_name = $image_array[$i]->getClientOriginalName();
                    $image_size = $image_array[$i]->getClientSize();
                    $extension = $image_array[$i]->getClientOriginalExtension();
                    $filename = 'Rapid_Leads_' . rand(1, 99999) . '.' . $extension;
                    // $watermark = Image::make(public_path('/images/frontend/images/logo.png'));
                    $large_image_path = public_path('images/frontend/property_images/large/' . $filename);
                    // Resize image
                    Image::make($image_array[$i])->resize(700, 578)->save($large_image_path);

                    // Store image in property folder
                    $property->image = $filename;
                    $propertyimage = PropertyImage::create([
                        'image_name' => $filename,
                        'image_size' => $image_size,
                        'property_id' => $property->id,
                    ]);
                }
            } else {
                $filename = "default.png";
                $property->image = "default.png";
                $propertyimage = PropertyImage::create([
                    'image_name' => $filename,
                    'image_size' => '7.4',
                    'property_id' => $property->id,
                ]);
            }

            return redirect()->back()->with('flash_message_success', 'Property Submited Successfully!');
        }

        $countrylist = Country::where('iso2', 'AE')->get();
        $states = State::where('country', 'AE')->get();
        $propertytype = PropertyType::where('status', 1)->orderBy('name', 'asc')->get();
        $amenities = Amenity::where('status', 1)->orderBy('name', 'asc')->get();
        return view('admin.property.add_property', compact('propertytype', 'countrylist', 'states', 'amenities'));
    }

    // Creating unique Slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Property::class, 'url', $request->property_name, ['unique' => true]);
        // echo "<pre>"; print_r($slug); die;
        return response()->json(['slug' => $slug]);
    }

    // Getting City List according to State
    public function getCityList(Request $request)
    {
        $cities = City::where("state_id", $request->state_id)->pluck("name", "id");
        return response()->json($cities);
    }

    // Add Amenities
    public function addAmenity(Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->all();
            // dd($data);
            if(!empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }

            $amenity = Amenity::create([
                'name'          => $data['amenity_name'],
                'amenity_code'  => $data['amenity_code'],
                'description'   => $data['description'],
                'status'        => $status
            ]);

            return redirect()->back()->with('flash_message_success', 'Amenity Added Successfully!');
        }
        return view('admin.property.add_amenities');
    }

    // View All Amenities in List
    public function allAmenity()
    {
        $amenities = Amenity::orderBy('name', 'asc')->get();

        return view('admin.property.amenities', compact('amenities'));
    }

    // Enable Amenity
    public function enableAmenity($id=null)
    {
        if(!empty($id)){
            Amenity::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('flash_message_success', 'Amenity Enabled Successfully!');
        }
    }

    // Disable Amenity
    public function disableAmenity($id)
    {
        if(!empty($id)){
            Amenity::where('id', $id)->update(['status'=> '0']);
            return redirect()->back()->with('flash_message_success', 'Amenity Disabled Successfully!');
        }
    }

    // View All Property in Dashboard
    public function allProperty()
    {
        $properties = Property::orderBy('created_at', 'desc')->get();
        $properties = json_decode(json_encode($properties));

        foreach($properties as $key => $val)
        {
            $prop_image_count = PropertyImage::where(['property_id' => $val->id])->count();
            if($prop_image_count > 0){
            $prop_image = PropertyImage::where(['property_id' => $val->id])->first();
            $properties[$key]->image_name = $prop_image->image_name;
            }
        }
        return view('admin.property.view_property', compact('properties'));
    }

}
