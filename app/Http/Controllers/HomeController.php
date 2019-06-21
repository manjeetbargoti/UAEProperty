<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Property;
use App\Subscriber;
use App\PropertyType;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    // Property by State
    public function cityProperty($id=null)
    {
        $properties = Property::where('city', $id)->orderBy('created_at', 'desc')->get();
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