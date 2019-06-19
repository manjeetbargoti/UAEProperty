@extends('layouts.frontend.home_design_2')
@section('content')

<style>
#filediv {
    display: inline-block !important;
}

#file {
    color: green;
    padding: 5px;
    border: 1px dashed #123456;
    background-color: #f9ffe5
}

#noerror {
    color: green;
    text-align: left
}

#error {
    color: red;
    text-align: left
}

#img {
    width: 17px;
    border: none;
    height: 17px;
    margin-left: 10px;
    cursor: pointer;
}

.abcd img {
    height: 100px;
    width: 100px;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid #e8debd
}

#close {
    vertical-align: top;
    background-color: red;
    color: white;
    border-radius: 5px;
    padding: 4px;
    margin-left: -13px;
    margin-top: 1px;
}
</style>

<div class="blank_space"></div>
<div id="smart_container">
    <section class="pt-1 pb-1">
        <div class="breadcrumb_sec">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb custom_breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Your Property</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="all_blogs">
        <div class="container">
            <h3 class="mb-3 text-center">List Your Property</h3>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="list_propertybox">
                        @if(Session::has('flash_message_success'))
                        <div class="alert alert-success alert-dismissible">
                            <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>{!! session('flash_message_success') !!}</strong>
                        </div>
                        @endif
                        @if(Session::has('flash_message_error'))
                        <div class="alert alert-error alert-dismissible">
                            <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                        </div>
                        @endif
                        <form method="post" name="list_property_form" id="ListProperty"
                            action="{{ url('/list-your-property') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-sm-12 col-md-12">
                                <h6 style="color: #000; font-weight: bold; padding-bottom: 0.5em;">User Information
                                </h6>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="User Name">User Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="User Email">User Email</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Phone Number">Phone no.</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <h6 style="color: #000; font-weight: bold; padding-bottom: 0.5em;">Property Basic
                                    Details
                                </h6>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Property Title">Property Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Property Title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Property For">Property For</label> <span
                                            class="badge badge-warning badge-sm">Buy/Rent/Off Plan</span>
                                        <select name="property_for" id="property_for" class="form-control">
                                            <option value="Buy">Buy</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Off Plan">Off Plan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Property Type">Property Type</label> <span
                                            class="badge badge-warning badge-sm">Villa/Residential/Commercial..
                                            etc.</span>
                                        <select name="property_type" id="property_type" class="form-control">
                                            @foreach(\App\PropertyType::where('status', 1)->orderBy('name',
                                            'asc')->get() as
                                            $pt)
                                            <option value="{{ $pt->name }}">{{ $pt->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Property Price">Property Price</label> <span
                                            class="badge badge-warning badge-sm">Property Price in AED</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">AED</span>
                                            </div>
                                            <input type="text" class="form-control" name="property_price"
                                                id="property_price">
                                        </div>
                                    </div>
                                </div>
                                <h6 style="color: #000; font-weight: bold; padding-bottom: 0.5em;">Property
                                    Information
                                </h6>
                                <div class="from-row">
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <textarea name="description" id="description"
                                            class="form-control my-editor"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12">
                                        <label>
                                            <input type="checkbox" name="commercial" id="commercial" class="flat-green"
                                                value="Commercial Property">
                                            Commercial <small class="text-purple pl-1">( If you check this set
                                                Commercial
                                                Property )</small>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label name="Property Area">Property Area (in sq. ft)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">sq/ft</span>
                                            </div>
                                            <input name="property_area" id="property_area" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Property Facing">Property Facing</label>
                                        <select name="property_facing" id="property_facing" class="form-control">
                                            <option value="" selected>Select Property Facing</option>
                                            <option value="East Facing">East Facing</option>
                                            <option value="West Facing">West Facing</option>
                                            <option value="North Facing">North Facing</option>
                                            <option value="South Facing">South Facing</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Furnish Type">Furnish Type</label>
                                        <select name="furnish_type" id="furnish_type" class="form-control">
                                            <option value="" selected>Select Furnish Type</option>
                                            <option value="Fully Furnished">Fully Furnished</option>
                                            <option value="Semi Furnished">Semi Furnished</option>
                                            <option value="Unfurnished">Unfurnished</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="Transection Type">Transaction Type</label>
                                        <select name="transection_type" id="transection_type" class="form-control">
                                            <option value="" selected>Select Transaction Type</option>
                                            <option value="New Booking">New Booking</option>
                                            <option value="Resale">Resale</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Construction Status</label>
                                        <select name="construction_status" id="construction_status"
                                            class="form-control">
                                            <option value="" selected>Select Construction Status</option>
                                            <option value="Under Construction">Under Construction</option>
                                            <option value="Ready to Move">Ready to Move</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Apple Trees">Rooms</label>
                                        <select name="rooms" id="rooms" class="form-control">
                                            <option value="" selected>Select Rooms</option>
                                            <?php for($i=1; $i<1000; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="Bedrooms">Bedrooms</label>
                                        <select name="bedrooms" id="bedrooms" class="form-control">
                                            <option value="" selected>Select Bedrooms</option>
                                            <?php for($i=1; $i<250; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Bathrooms">Bathrooms</label>
                                        <select name="bathrooms" id="bathrooms" class="form-control">
                                            <option value="" selected>Select Bathrooms</option>
                                            <?php for($i=1; $i<150; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Parkings">Parkings</label>
                                        <select name="parking" id="parking" class="form-control">
                                            <option value="" selected>Select Parking</option>
                                            <?php for($i=1; $i<10; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="Personal Washroom">Personal Washroom</label>
                                        <select name="p_washroom" id="p_washroom" class="form-control">
                                            <option value="" selected>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Cafeteria">Pantry/Cafeteria</label>
                                        <select name="cafeteria" id="cafeteria" class="form-control">
                                            <option value="" selected>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Property Age">Property Age</label>
                                        <select name="property_age" id="property_age" class="form-control">
                                            <option value="" selected>Select</option>
                                            <?php for($i=1; $i<100; $i++) { ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <h6 style="color: #000; font-weight: bold; padding-bottom: 0.5em;">Property Address
                                </h6>

                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="inputAddress">Property Address 1</label>
                                        <textarea name="address1" id="address1" rows="3"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="inputAddress2">Property Address 2</label> <span
                                            class="badge badge-success badge-sm">Optional</span>
                                        <textarea name="address2" id="address2" rows="3"
                                            class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="Country">Country</label>
                                        <select id="country" name="country" class="form-control">
                                            @foreach(\App\Country::where('iso2', 'AE')->get() as $country)
                                            <option value="{{ $country->iso2 }}" selected>{{ $country->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="State">State</label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="" selected>Select State</option>
                                            @foreach(\App\State::where('country', 'AE')->get() as $s)
                                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="City">City</label>
                                        <select id="city" name="city" class="form-control">
                                            <option value="" selected>Select City</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="Unit no.">Unit no.</label>
                                        <input name="unit_no" id="unit_no" type="text" class="form-control block-level">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Locality">Locality</label>
                                        <input type="text" name="locality" id="locality" class="form-control"
                                            placeholder="Locality">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Zipcode/Postal Code">P.O.Box</label> <span
                                            class="badge badge-warning badge-sm">Optional</span>
                                        <input name="zipcode" id="zipcode" type="text" class="form-control"
                                            placeholder="Postal Code">
                                    </div>
                                </div>

                                <h6 style="color: #000; font-weight: bold; padding-bottom: 0.5em;">Property Images
                                </h6>

                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="add_image">
                                            <input type="button" id="add_more" class="btn btn-info" value="add image" />
                                        </div>
                                        <!-- <input type="file" class="form-control" name="file" id="file"> -->
                                    </div>
                                </div>

                                <h6 style="color: #000; font-weight: bold; padding-bottom: 0.5em;">Property
                                    Amenities
                                </h6>

                                <div class="form-row">
                                    @foreach(\App\Amenity::where('status', 1)->get() as $a)
                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>
                                            <input type="checkbox" name="amenity[]"
                                                id="<?php echo preg_replace('/[^a-zA-Z0-9-]/','' ,strtolower($a->name)); ?>"
                                                class="flat-green" value="{{ $a->name }}"> {{ $a->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit Property</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection