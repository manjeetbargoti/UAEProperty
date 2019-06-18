@extends('layouts.backend.admin_design')
@section('content')

<?php
 
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
?>

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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Property</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit Property</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-purple">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form enctype="multipart/form-data" method="post" action="{{ url('/admin/property/'.$property->id.'/edit') }}"
                            name="edit_property" id="edit_property" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="col-sm-12 col-md-9">
                                <div class="row">
                                    <div class="property_basic col-sm-12 col-md-12">
                                        <div class="property_heading col-xs-12 col-md-12">
                                            <h4><strong>Property Basic Details</strong></h4>
                                        </div>

                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label for="Property Name">Property Name</label>
                                                <input type="text" name="property_name" id="property_name"
                                                    class="form-control" value="{{ $property->name }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="Url">Url</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Url</span>
                                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $property->url }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="Property For">Property For</label>
                                                <select name="property_for" id="property_for"
                                                    class="form-control select2" style="width: 100%;" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" selected>Properties</option>
                                                    <option value="1" @if($property->property_for == 1) selected @endif>Buy</option>
                                                    <option value="2" @if($property->property_for == 2) selected @endif>Rent</option>
                                                    <option value="3" @if($property->property_for == 3) selected @endif>Off Plan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="Property Type">Property Type</label>
                                                <select name="property_type" id="PropertyType" class="form-control"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    <option value="" selected>Select Property Type</option>
                                                    @foreach($propertytype as $ptype)
                                                    <option value="{{ $ptype->type_code }}" @if($property->property_type == $ptype->type_code) selected @endif>
                                                        {{ $ptype->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-4 hidden">
                                            <div class="form-group">
                                                <label name="Property Code">Property Code</label>
                                                <div class="input-group">
                                                    <input name="property_code" id="property_code" type="text"
                                                        value="{{ $property->property_code }}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label name="Property Price">Property Price</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><strong>AED</strong></span>
                                                    <input name="property_price" id="property_price" type="text"
                                                        class="form-control" value="{{ $property->property_price }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="PropertyInfo" class="property_info col-sm-12 col-md-12">
                                        <div class="property_heading col-xs-12 col-md-12">
                                            <h4><strong>Property Information</strong></h4>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label for="Description">Description</label>
                                                <textarea name="description" id="description"
                                                    class="form-control my-editor">{{ $property->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" name="feature" id="feature"
                                                        class="flat-green" @if($property->featured == 1) checked @endif value="1"> Featured <small
                                                        class="text-purple pl-1">( If you check this set Featured
                                                        Property )</small>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" name="commercial" id="commercial"
                                                        class="flat-green" @if($property->commercial == 1) checked @endif value="1"> Commercial <small
                                                        class="text-purple pl-1">( If you check this set Commercial
                                                        Property )</small>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-4">
                                            <div class="form-group">
                                                <label name="Property Area">Property Area (in sq. ft)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">sq/ft</span>
                                                    <input name="property_area" id="property_area" type="text"
                                                        class="form-control" value="{{ $property->property_area }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-4">
                                            <div class="form-group">
                                                <label for="Property Facing">Property Facing</label>
                                                <select name="property_facing" id="property_facing"
                                                    class="form-control">
                                                    <option value="" selected>Select Property Facing</option>
                                                    <option value="East" @if($property->property_facing == 'East') selected @endif>East Facing</option>
                                                    <option value="West" @if($property->property_facing == 'West') selected @endif>West Facing</option>
                                                    <option value="North" @if($property->property_facing == 'North') selected @endif>North Facing</option>
                                                    <option value="South" @if($property->property_facing == 'South') selected @endif>South Facing</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="FurnishStatus" class="col-xs-12 col-md-4">
                                            <div class="form-group">
                                                <label for="Furnish Type">Furnish Type</label>
                                                <select name="furnish_type" id="furnish_type" class="form-control">
                                                    <option value="" selected>Select Furnish Type</option>
                                                    <option value="F" @if($property->furnish_type == 'F') selected @endif>Fully Furnished</option>
                                                    <option value="S" @if($property->furnish_type == 'S') selected @endif>Semi Furnished</option>
                                                    <option value="U" @if($property->furnish_type == 'U') selected @endif>Unfurnished</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-4">
                                            <div class="form-group">
                                                <label for="Transection Type">Transaction Type</label>
                                                <select name="transection_type" id="transection_type"
                                                    class="form-control">
                                                    <option value="" selected>Select Transaction Type</option>
                                                    <option value="New Booking" @if($property->transection_type == 'New Booking') selected @endif>New Booking</option>
                                                    <option value="Resale" @if($property->transection_type == 'Resale') selected @endif>Resale</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-4">
                                            <div class="form-group">
                                                <label>Construction Status</label>
                                                <select name="construction_status" id="construction_status"
                                                    class="form-control">
                                                    <option value="" selected>Select Construction Status</option>
                                                    <option value="UC" @if($property->construction_status == 'UC') selected @endif>Under Construction</option>
                                                    <option value="RM" @if($property->construction_status == 'RM') selected @endif>Ready to Move</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="Rooms" class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="Apple Trees">Rooms</label>
                                                <select name="rooms" id="rooms" class="form-control">
                                                    <option value="" selected>Select Rooms</option>
                                                    <?php for($i=1; $i<1000; $i++) { ?>
                                                    <option @if($property->rooms == $i) selected @endif value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="Bedrooms" class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="Bedrooms">Bedrooms</label>
                                                <select name="bedrooms" id="bedrooms" class="form-control">
                                                    <option value="" selected>Select Bedrooms</option>
                                                    <?php for($i=1; $i<250; $i++) { ?>
                                                    <option @if($property->bedrooms == $i) selected @endif value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="Bathrooms" class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="Bathrooms">Bathrooms</label>
                                                <select name="bathrooms" id="bathrooms" class="form-control">
                                                    <option value="" selected>Select Bathrooms</option>
                                                    <?php for($i=1; $i<150; $i++) { ?>
                                                    <option @if($property->bathrooms == $i) selected @endif value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="Parkings" class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="Parkings">Parkings</label>
                                                <select name="parking" id="parking" class="form-control">
                                                    <option value="" selected>Select Parking</option>
                                                    <?php for($i=1; $i<10; $i++) { ?>
                                                    <option @if($property->parking == $i) selected @endif value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="PWashroom" class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="Personal Washroom">Personal Washroom</label>
                                                <select name="p_washroom" id="p_washroom" class="form-control">
                                                    <option value="" selected>Select</option>
                                                    <option value="1" @if($property->p_washrooms == 1) selected @endif>Yes</option>
                                                    <option value="0" @if($property->p_washrooms == 0) selected @endif>No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="Cafeteria" class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="Cafeteria">Pantry/Cafeteria</label>
                                                <select name="cafeteria" id="cafeteria" class="form-control">
                                                    <option value="" selected>Select</option>
                                                    <option value="1" @if($property->cafeteria == 1) selected @endif>Yes</option>
                                                    <option value="0" @if($property->cafeteria == 0) selected @endif>No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="Property Age">Property Age</label>
                                                <select name="property_age" id="property_age" class="form-control">
                                                    <option value="" selected>Select</option>
                                                    <?php for($i=1; $i<100; $i++) { ?>
                                                    <option @if($property->property_age == $i) selected @endif value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="property_address col-sm-12 col-md-12">
                                        <div class="property_heading col-xs-12 col-md-12">
                                            <h4><strong>Property Address</strong></h4>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="Property Address">Property Address 1</label>
                                                <textarea name="property_address1" id="property_address1"
                                                    class="form-control" rows="3"
                                                    placeholder="Address Line 1">{{ $property->addressline1 }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="Property Address">Property Address 2</label>
                                                <textarea name="property_address2" id="property_address2"
                                                    class="form-control" rows="3"
                                                    placeholder="Address Line 2">{{ $property->addressline2 }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="Unit no.">Unit no.</label>
                                                <input name="unit_no" id="unit_no" type="text"
                                                    class="form-control block-level" value="{{ $property->unitno }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="Locality">Locality</label>
                                                <input type="text" name="locality" id="locality" class="form-control" value="{{ $property->locality }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="Country">Country</label>
                                                <select name="country" id="country" class="form-control"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                    @foreach($countrylist as $c)
                                                    <option value="{{ $c->iso2 }}">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="State">State</label>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    name="state" id="state_edit" style="width: 100%;" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" selected>Select State</option>
                                                    @foreach($states as $s)
                                                    <option value="{{ $s->id }}" @if($s->id == $property->state) selected @endif>{{ $s->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="City">City</label>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    name="city" id="city_edit" style="width: 100%;" tabindex="-1"
                                                    aria-hidden="true">
                                                    <!-- <option value="" selected>Select City</option> -->
                                                    <?php echo $city_dropdown; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" id="p_id" value="{{ $property->id }}">

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="Zipcode/Postal Code">Zipcode/Postal Code</label>
                                                <input name="zipcode" id="zipcode" type="text" class="form-control" value="{{ $property->postalcode }}">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Rows -->
                                <div class="property_images col-sm-12 col-md-12">
                                    <div class="property_heading">
                                        <h4><strong>Property Images</strong></h4>
                                    </div>
                                    <div class="form-group">
                                        @foreach(\App\PropertyImage::where('property_id', $property->id)->get() as $propImages)
                                        @if(!empty($propImages->image_name))
                                        <div class="abcd">
                                            <input type="hidden" name="current_image[]" multiple id="image" value="{{ $propImages->image_name }}">           
                                            <img src="{{ url('/images/frontend/property_images/large/'.$propImages->image_name)}}"> <a href="{{ url('/admin/property-image/'.$propImages->id.'/delete') }}"><i id="close" alt="delete" class="fa fa-close"></i></a>
                                        </div>
                                        @endif
                                        @endforeach
                                        <div class="add_image">
                                            <input type="button" id="add_more" class="btn btn-info" value="add image" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="row">
                                    <div class="property_basic col-sm-12 col-md-12">
                                        <div class="property_heading col-xs-12 col-md-12">
                                            <h4><strong>Property Amenities</strong></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        @foreach($amenities as $a)
                                        <div class="col-xs-6 col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" name="amenity[]" id="<?php echo preg_replace('/[^a-zA-Z0-9-]/','' ,strtolower($a->name)); ?>"
                                                        class="flat-green" value="{{ $a->amenity_code }}" @foreach(explode(',', $property->amenities) as $am) @if($a->amenity_code == $am) checked @endif @endforeach> {{ $a->name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="box-footer">
                                            <input type="submit" class="btn btn-success btn-md btn-block"
                                                value="Update Property">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection