@extends('layouts.frontend.home_design_2')
@section('content')

<div class="blank_space"></div>
<div id="smart_container">

    <section class="all_blogs">
        <div class="container">

            <div class="row">
                <div class="col-lg-7 m-auto">
                    @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-dismissible">
                        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                    @endif
                    @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                    @endif
                    <h3 class="mb-3 text-left">List Your Property</h3>
                    <p class="mb-3">To make an enquiry or for more information call +971 (0)4 4294444 or submit this
                        form
                        and one of our team will contact you as soon as possible.</p>
                    <div class="list_propertybox">
                        <form name="list_property" id="ListProperty" method="post"
                            action="{{ url('/list-your-property') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Office: *</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="office" id="office"
                                        placeholder="Dubai" required>
                                </div>
                            </div>

                            <h4 class="mb-3">Your Details</h4>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Title: *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="prefix" id="prefix" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">First Name: *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="fname" id="fname" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Last Name: *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="lname" id="lname" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Telephone: *</label>
                                <div class="col-sm-8">
                                    <input id="phone" name="phone" type="tel">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email Address: *</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>

                            <h4 class="mb-3">Property Details</h4>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Apartment / Villa Number: *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="building_no" id="building_no" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Building Name: *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="building_name" id="building_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Community : *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="community" id="community" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Emirate: *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="emirate" id="emirate" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Property Type: *</label>
                                <div class="col-sm-8">
                                    <select id="propertyType" name="property_type" class="form-control">
                                        @foreach($property_type as $pt)
                                        <option value="{{ $pt->name }}">{{ $pt->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">No. of Bedrooms: *</label>
                                <div class="col-sm-8">
                                    <select id="bedrooms" name="bedrooms" class="form-control">
                                        <option selected>1+</option>
                                        <option>2+</option>
                                        <option>3+</option>
                                        <option>4+</option>
                                        <option>5+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Approx. Sq. Ft: *</label>
                                <div class="col-sm-8">
                                    <input type="text" name="property_area" id="property_area" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Are you considering: *</label>
                                <div class="col-sm-8 text-right">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="considering_for" id="Selling"
                                            value="Selling">
                                        <label class="form-check-label" for="Selling">Selling</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="considering_for" id="Letting"
                                            value="Letting">
                                        <label class="form-check-label" for="Letting">Letting</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="considering_for" id="Both"
                                            checked value="Both">
                                        <label class="form-check-label" for="Both">Both</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Captcha: *</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6Le48aoUAAAAAN5OuFa4-BMG3KihvWRR6WAFSNXu"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            name="term_condition" value="Accepted">
                                        <label class="custom-control-label" for="customCheck1">
                                            <small>I agree to the Terms and Conditions, Privacy Policy & Cookie
                                                Policy.</small>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2"
                                            name="privacy" value="Accepted">
                                        <label class="custom-control-label" for="customCheck2">
                                            <small>I agree to receiving regular newsletters in accordance with the
                                                privacy policy.</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary right">Submit Property</button>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 ml-auto text-right mt-2">
                                    <p style="font-size: 10px;line-height: normal;"><b>Note:</b> We take your privacy
                                        seriously. All details and information provided are dealt with in a professional
                                        manner according to our Privacy Policy.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @endsection