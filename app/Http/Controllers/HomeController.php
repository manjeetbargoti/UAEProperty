<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Amenity;
use App\Property;
use App\Subscriber;
use App\PropertyType;
use GuzzleHttp\Client;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

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
        $client = new Client();
        $prop = $client->request('GET', 'https://api.mycrm.com/properties?per_page=50&sort=id&sort_order=desc', [
            'headers' => [
                'Authorization' => 'Bearer 6ad4485a523c28cf90e5cbe9d185dfbd11fc422f',
            ]
        ]);

        // $data = $prop->paginate(20);

        $data = $prop->getBody();
        $data = json_decode($data, true);
        $property_data = $data['properties'];
        $property_data = json_decode(json_encode($property_data));
        // $property_f = $property_data[0]['price']['offering_type'];

        foreach($property_data as $key => $prop_data)
        {
            if($prop_data->price->offering_type == 'sale'){
                $property_data[$key]->property_for = 1;
            }elseif($prop_data->price->offering_type == 'rent'){
                $property_data[$key]->property_for = 2;
            }
            $property_data[$key]->name = $prop_data->languages[0]->title;
            $property_data[$key]->property_type = $prop_data->type->name;
            if(!empty($prop_data->price->prices[0]->value)){
                $property_data[$key]->property_price = $prop_data->price->prices[0]->value;
            }
            $property_data[$key]->city_name = $prop_data->location->community;
            $property_data[$key]->state_name = $prop_data->location->city;
        }

        $properties = Property::orderBy('created_at', 'desc')->get();
        $properties = json_decode(json_encode($properties));

        foreach($properties as $key => $val)
        {
            $prop_type = PropertyType::where(['type_code' => $val->property_type])->first();
            $properties[$key]->property_type = $prop_type->name;

            $city_name = City::where(['id' => $val->city])->first();
            $properties[$key]->city_name = $city_name->name;

            $state_name = State::where(['id' => $val->state])->first();
            $properties[$key]->state_name = $state_name->name;

            $prop_img_count = PropertyImage::where(['property_id' => $val->id])->count();
            if($prop_img_count > 0)
            {
                $prop_img = PropertyImage::where(['property_id' => $val->id])->first();
                $properties[$key]->image_name = $prop_img->image_name;
            }
        }

        $properties = json_decode(json_encode($properties), true);
        $properties = array_merge($properties, $property_data);
        $properties = json_decode(json_encode($properties));

        // echo "<pre>"; print_r($properties); die;

        return view('homepage', compact('properties'));
    }

    // View Signle Property Detail Page
    public function singleProperty(Request $request, $id=null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Property Enquiry Email
            $to =['manjeet.singh@magicgroupinc.com','hrishabh@isupportcomputer.org'];
            $email = $to;
            $messageData = ['email'=>$data['email'], 'phone'=>$data['phone'], 'name'=>$data['full_name'], 'prop_name'=>$data['prop_name'], 'prop_url'=>$data['prop_url'], 'enquiry_message'=>$data['enquiry_message']];
            Mail::send('emails.enquiry', $messageData, function($message) use($email){
                $message->to($email)->subject('A User Send an Enquiry about Property');
            });

            return redirect()->back()->with('flash_message_success', 'An Email has been sent to the admin.');
        }

        $property_count = Property::where('id', $id)->count();

        if($property_count > 0){
            $property = Property::where('id', $id)->get();
            $property = json_decode(json_encode($property));
            // echo "<pre>"; print_r($property); die;

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

            $property = json_decode(json_encode($property[0]));

        }else{
            $client = new Client();
            $prop = $client->request('GET', 'https://api.mycrm.com/properties/'.$id, [
                    'headers' => [
                        'Authorization' => 'Bearer 6ad4485a523c28cf90e5cbe9d185dfbd11fc422f',
                    ]
            ]);

            // Single Property
            $data = $prop->getBody();
            $data = json_decode($data, true);
            $property = $data['property'];
            $property = json_decode(json_encode($property));

            if($property->price->offering_type == 'sale'){
                $property->property_for = 1;
            }elseif($property->price->offering_type == 'rent'){
                $property->property_for = 2;
            }
            $property->name = $property->languages[0]->title;
            $property->property_type = $property->type->name;
            if(!empty($property->price->prices[0]->value)){
                $property->property_price = $property->price->prices[0]->value.' /'.$property->price->prices[0]->period;
            }elseif(!empty($property->price->value)){
                $property->property_price = $property->price->value;
            }
            $property->city_name = $property->location->community;
            $property->state_name = $property->location->city;
            $property->property_code = $property->reference;
            $property->property_area = $property->size;
            if($property->furnished == "furnished"){
                $property->furnish_type = 'F';
            }elseif(!empty($property->furnished == "unfurnished")){
                $property->furnish_type = 'U';
            }elseif(!empty($property->furnished == "semi-furnished")){
                $property->furnish_type = 'S';
            }
            $property->description = $property->languages[0]->description;
            $property->city = $property->location->city;
            $property->am = $property->amenities;
        }

        $property = json_decode(json_encode($property));

        $client = new Client();
        $prop_all = $client->request('GET', 'https://api.mycrm.com/properties', [
            'headers' => [
                'Authorization' => 'Bearer 6ad4485a523c28cf90e5cbe9d185dfbd11fc422f',
            ]
        ]);

        // All Property
        $data = $prop_all->getBody();
        $data = json_decode($data, true);
        $property_all = $data['properties'];
        $property_all = json_decode(json_encode($property_all));

        // $property->city = $property_all->location->city;

        // echo "<pre>"; print_r($property); die;

        return view('frontend.property.single_property', compact('property', 'property_all'));
    }

    // Property Category Page Function
    public function propertyCategory($url=null)
    {
        $property_type_code = PropertyType::where('url', $url)->get();
        $properties = Property::where('property_type', $property_type_code[0]->type_code)->orderBy('created_at', 'desc')->get();
        $properties = json_decode(json_encode($properties));

        foreach($properties as $key => $val)
        {
            $prop_type = PropertyType::where(['type_code' => $val->property_type])->first();
            $properties[$key]->property_type = $prop_type->name;

            $city_name = City::where(['id' => $val->city])->first();
            $properties[$key]->city_name = $city_name->name;

            $state_name = State::where(['id' => $val->state])->first();
            $properties[$key]->state_name = $state_name->name;

            $prop_img_count = PropertyImage::where(['property_id' => $val->id])->count();
            if($prop_img_count > 0)
            {
                $prop_img = PropertyImage::where(['property_id' => $val->id])->first();
                $properties[$key]->image_name = $prop_img->image_name;
            }
        }
        // echo "<pre>"; print_r($properties); die;

        return view('frontend.property.property_category', compact('properties'));
    }

    // Property by Buy/Rent/Off Plan function
    // public function propertyFor($id=null)
    // {
    //     if($id == 1){
    //         $property_for = 'sale';
    //     }elseif($id == 2){
    //         $property_for = 'rent';
    //     }elseif($id == 3) {
    //         $property_for = 'off-plan';
    //     }

    //     $client = new Client();
    //     $prop = $client->request('GET', 'https://api.mycrm.com/properties?filters[offering_type]='.$property_for, [
    //         'headers' => [
    //             'Authorization' => 'Bearer 6ad4485a523c28cf90e5cbe9d185dfbd11fc422f',
    //         ]
    //     ]);

    //     // $data = $prop->paginate(20);

    //     $data = $prop->getBody();
    //     $data = json_decode($data, true);
    //     $property_data = $data['properties'];
    //     $property_data = json_decode(json_encode($property_data));
    //     // echo "<pre>"; print_r($data); die;
    //     // $property_f = $property_data[0]['price']['offering_type'];

    //     foreach($property_data as $key => $prop_data)
    //     {
    //         if($prop_data->price->offering_type == 'sale'){
    //             $property_data[$key]->property_for = 1;
    //         }elseif($prop_data->price->offering_type == 'rent'){
    //             $property_data[$key]->property_for = 2;
    //         }
    //         $property_data[$key]->name = $prop_data->languages[0]->title;
    //         $property_data[$key]->property_type = $prop_data->type->name;
    //         if(!empty($prop_data->price->prices[0]->value)){
    //             $property_data[$key]->property_price = $prop_data->price->prices[0]->value;
    //         }elseif(!empty($prop_data->price->value)){
    //             $property_data[$key]->property_price = $prop_data->price->value;
    //         }
    //         $property_data[$key]->city_name = $prop_data->location->community;
    //         $property_data[$key]->state_name = $prop_data->location->city;
    //     }

    //     $properties = Property::where('property_for', $id)->orderBy('created_at', 'desc')->get();
    //     $properties = json_decode(json_encode($properties));

    //     foreach($properties as $key => $val)
    //     {
    //         $prop_type = PropertyType::where(['type_code' => $val->property_type])->first();
    //         $properties[$key]->property_type = $prop_type->name;

    //         $city_name = City::where(['id' => $val->city])->first();
    //         $properties[$key]->city_name = $city_name->name;

    //         $state_name = State::where(['id' => $val->state])->first();
    //         $properties[$key]->state_name = $state_name->name;

    //         $prop_img_count = PropertyImage::where(['property_id' => $val->id])->count();
    //         if($prop_img_count > 0)
    //         {
    //             $prop_img = PropertyImage::where(['property_id' => $val->id])->first();
    //             $properties[$key]->image_name = $prop_img->image_name;
    //         }
    //     }

    //     // $properties = json_decode(json_encode($properties), true);
    //     $properties = array_merge($properties, $property_data);
    //     // $properties = $property_data;

    //     // echo "<pre>"; print_r($properties); die;

    //     return view('frontend.property.property_category', compact('properties'));
    // }
    public function propertyFor(Request $request, $id=null,$url=null, $page = null)
    {
        if($id == 1){
            $property_for = 'sale';
        }elseif($id == 2){
            $property_for = 'rent';
        }elseif($id == 3) {
            $property_for = 'off-plan';
        }
        $type   = $id ;
        $client = new Client();
        $prop = $client->request('GET', 'https://api.mycrm.com/properties?filters[offering_type]='.$property_for.'&per_page=20&page='.$page.'&sort=id&sort_order=desc', [
            'headers' => [
                'Authorization' => 'Bearer 6ad4485a523c28cf90e5cbe9d185dfbd11fc422f',
            ]
        ]);
        $data = $prop->getBody();
        $data = json_decode($data, true);
        $property_data = $data['properties'];
        $counterApi= $data['count'];
        $property_data = json_decode(json_encode($property_data));
        foreach($property_data as $key => $prop_data)
        {
            if($prop_data->price->offering_type == 'sale'){
                $property_data[$key]->property_for = 1;
            }elseif($prop_data->price->offering_type == 'rent'){
                $property_data[$key]->property_for = 2;
            }
            $property_data[$key]->name = $prop_data->languages[0]->title;
            $property_data[$key]->property_type = $prop_data->type->name;
            if(!empty($prop_data->price->prices[0]->value)){
                $property_data[$key]->property_price = $prop_data->price->prices[0]->value;
            }elseif(!empty($prop_data->price->value)){
                $property_data[$key]->property_price = $prop_data->price->value;
            }
            $property_data[$key]->city_name = $prop_data->location->community;
            $property_data[$key]->state_name = $prop_data->location->city;
        }
        $properties = Property::where('property_for', $id)->orderBy('created_at', 'desc')->get();
        $properties = json_decode(json_encode($properties));
        $counterDb  = count($properties);
        foreach($properties as $key => $val)
        {
            $prop_type = PropertyType::where(['type_code' => $val->property_type])->first();
            $properties[$key]->property_type = $prop_type->name;

            $city_name = City::where(['id' => $val->city])->first();
            $properties[$key]->city_name = $city_name->name;

            $state_name = State::where(['id' => $val->state])->first();
            $properties[$key]->state_name = $state_name->name;

            $prop_img_count = PropertyImage::where(['property_id' => $val->id])->count();
            if($prop_img_count > 0)
            {
                $prop_img = PropertyImage::where(['property_id' => $val->id])->first();
                $properties[$key]->image_name = $prop_img->image_name;
            }
        }
        $properties = array_merge($properties, $property_data);
        $counter = $counterApi + $counterDb;
        $numOfpages = intval($counter/20)+1;
        $current_page = $page;
            if($current_page == 1){
                $has_next_page = true;
                $has_previous_page = false;
                $next_page = $current_page + 1;
            }elseif($current_page < $numOfpages){
                $has_next_page = true;
                $has_previous_page = true;
                $next_page = $current_page + 1;
            }elseif($numOfpages <= $current_page ){
                $has_next_page = false;
                $has_previous_page = true;
                $next_page = $current_page;
            }
        return view('frontend.property.property_category', compact('url','type','properties','numOfpages','current_page','has_next_page','has_previous_page','next_page'));
    }

    // Property by State
    public function cityProperty($id=null)
    {
        // if($id=47987){
        //     $city = 'Dubai';
        //     $location_id = "are.3.2511";
        // }

        // $client = new Client();
        // $prop = $client->request('GET', 'https://api.mycrm.com/properties?filters[location_ids]='.$location_id.'&per_page=50&sort=id&sort_order=desc', [
        //     'headers' => [
        //         'Authorization' => 'Bearer 6ad4485a523c28cf90e5cbe9d185dfbd11fc422f',
        //     ]
        // ]);

        // $data = $prop->paginate(20);

        // $data = $prop->getBody();
        // $data = json_decode($data, true);
        // $property_data = $data['properties'];
        // $property_data = json_decode(json_encode($property_data));
        // // $property_f = $property_data[0]['price']['offering_type'];

        // foreach($property_data as $key => $prop_data)
        // {
        //     if($prop_data->price->offering_type == 'sale'){
        //         $property_data[$key]->property_for = 1;
        //     }elseif($prop_data->price->offering_type == 'rent'){
        //         $property_data[$key]->property_for = 2;
        //     }
        //     $property_data[$key]->name = $prop_data->languages[0]->title;
        //     $property_data[$key]->property_type = $prop_data->type->name;
        //     if(!empty($prop_data->price->prices[0]->value)){
        //         $property_data[$key]->property_price = $prop_data->price->prices[0]->value;
        //     }elseif(!empty($prop_data->price->value)){
        //         $property_data[$key]->property_price = $prop_data->price->value;
        //     }
        //     $property_data[$key]->city_name = $prop_data->location->community;
        //     $property_data[$key]->state_name = $prop_data->location->city;
        // }

        $properties = Property::where(['city' => $id, 'property_for' => 3])->orderBy('created_at', 'desc')->get();
        $properties = json_decode(json_encode($properties));

        foreach($properties as $key => $val)
        {
            $prop_type = PropertyType::where(['type_code' => $val->property_type])->first();
            $properties[$key]->property_type = $prop_type->name;

            $city_name = City::where(['id' => $val->city])->first();
            $properties[$key]->city_name = $city_name->name;

            $state_name = State::where(['id' => $val->state])->first();
            $properties[$key]->state_name = $state_name->name;

            $prop_img_count = PropertyImage::where(['property_id' => $val->id])->count();
            if($prop_img_count > 0)
            {
                $prop_img = PropertyImage::where(['property_id' => $val->id])->first();
                $properties[$key]->image_name = $prop_img->image_name;
            }
        }

        // $properties = array_merge($properties, $property_data);

        return view('frontend.property.property_category', compact('properties'));
    }

    // Subscribe Now
    public function subscribe(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            Subscriber::create([
                'email' => $data['email']
            ]);

            // echo "<pre>"; print_r($data); die;
            return redirect()->back()->with('subscribe_message','You are added to Subscribers List Successfully!');
        }
    }

    // Subscriber List in Admin Panel
    public function subscriberList()
    {
        return view('admin.subscribe.subscriber_list');
    }

    // Home Page Search Function Start
    public function search(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = City::where('name', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="searchdrop">';
            foreach($data as $row)
            {
                $flag = '<span class="flag_name">'.$row->id.'</span>';
                $output .= '<li id="city_search">'.$row->name.'</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    // Home Page Search-Result Function Start
    public function searchresult(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $scityname = rtrim($data['search_text']);
        $scityID = $data['property_type'];
        $scityname = json_decode(json_encode($scityname));
        $city = City::where(['name'=> rtrim($data['search_text']) ])->get();
        $city = json_decode(json_encode($city),true);

        if(empty( $data['search_text'])){
            $properties = Property::where([ 'property_for'=>$data['property_type']])->get();
        }elseif(!empty($city[0])){
            $id = $city[0];
            $properties = Property::where([[ 'city','=',$id['id']], [ 'property_for', '=', $data['property_type']]])->get();
        }else{
            $id = null;
            $properties = Property::where([ 'city'=> $id['id']])->get();
        }return view('frontend.property.property_category', compact('properties'));
    }
}