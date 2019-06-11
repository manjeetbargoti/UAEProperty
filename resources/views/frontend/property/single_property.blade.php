@extends('layouts.frontend.home_design_2')
@section('content')

@foreach($property as $p)
<section class="search_inside">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 m-auto">
                <div class="searchbox p-0">
                    <ul class="nav d-flex justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="tabnav active" id="buy-tab" data-toggle="tab" href="#buy" role="tab"
                                aria-controls="buy" aria-selected="true">BUY</a>
                        </li>
                        <li class="nav-item">
                            <a class="tabnav" id="rent-tab" data-toggle="tab" href="#rent" role="tab"
                                aria-controls="rent" aria-selected="false">Rent</a>
                        </li>
                    </ul>
                    <div class="tab-content searchbg" id="myTabContent">
                        <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                            <div class="search_input">
                                <input type="search" placeholder="Search State, City or Area">
                                <button type="submit"><i class="icon ion-md-search"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                            <div class="search_input">
                                <input type="search" placeholder="Search State, City or Area">
                                <button type="submit"><i class="icon ion-md-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="smart_container">
    <section class="pt-1 pb-1">
        <div class="breadcrumb_sec">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb custom_breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/properties') }}">Properties</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $p->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="pt-1">
        <div class="container">
            <div class="details_headding">
                <div class="row">
                    <div class="col-md-7">
                        <h5>{{ $p->name }}</h5>
                        <p>{{ $p->name }}</p>
                    </div>
                    <div class="col-md-5">
                        <div class="share_query">
                            <div class="callquery">
                                <a href="#"><img src="{{ url('/images/frontend/images/mail.svg') }}"></a>
                                <a href="#"><img src="{{ url('/images/frontend/images/wp.svg') }}"></a>
                                <a href="#"><img src="{{ url('/images/frontend/images/call.svg') }}"></a>
                            </div>
                            <a href="#" class="enquirebtn"><i class="fa fa-info"></i>Enquire Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="demo">
                <div class="item">
                    <div class="clearfix">
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                            <li data-thumb="{{ url('/images/frontend/images/s1.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s1.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s2.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s2.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s3.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s3.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s4.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s4.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s5.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s5.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s1.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s1.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s2.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s2.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s3.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s3.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s4.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s4.jpg') }}" />
                            </li>
                            <li data-thumb="{{ url('/images/frontend/images/s5.jpg') }}">
                                <img src="{{ url('/images/frontend/images/s5.jpg') }}" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="prop_detailsinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="prop_table">
                        <h5>FACTS</h5>
                        <table class="table-responsive table table-bordered ">
                            <tbody>
                                <tr>
                                    <td scope="row">Price</td>
                                    <td>@if($p->property_for == 2)
                                        AED {{ $p->property_price }} <span>/Year</span>
                                        @else
                                        AED {{ $p->property_price }}
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Type</td>
                                    <td>@foreach(\App\PropertyType::where('type_code', $p->property_type)->get() as
                                        $ptype) {{ $ptype->name }} @endforeach</td>
                                </tr>
                                <tr>
                                    <td scope="row">Property Code</td>
                                    <td>{{ $p->property_code }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Bedrooms</td>
                                    <td>{{ $p->bedrooms }} @foreach(explode(',', $p->amenities) as $am) @if($am ==
                                        'AM9561') + Maids Room @endif @endforeach</td>
                                </tr>
                                <tr>
                                    <td scope="row">Bathrooms</td>
                                    <td>{{ $p->bathrooms }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Furnishings</td>
                                    <td>@if($p->furnish_type == 'U') Unfurnished @elseif($p->furnish_type == 'S') Semi
                                        Furnished @elseif($p->furnish_type == 'F') Fully Furnished @endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Area</td>
                                    <td>{{ $p->property_area }} sqft.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prop_table">
                        <h5>AMENITIES</h5>
                        <table class="table-responsive table table-bordered ">
                            <tbody>
                                @foreach(explode(',', $p->amenities) as $am)
                                    @foreach(\App\Amenity::where('amenity_code', $am)->get() as $amenity)
                                    <tr>
                                        <td scope="row">{{ $amenity->name }}</td>
                                        <!-- <td scope="row">Test</td> -->
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <p>{!! $p->description !!}</p>
        </div>
    </section>
    <section class="property_sec">
        <div class="container">
            <h3 class="mb-3">More available in the same area</h3>
            <div class="row">
                <?php $counter = 0; ?>
                @foreach(\App\property::where('city', $p->city)->orWhere('state', $p->state)->inRandomOrder()->get() as
                $prel)
                <?php $counter++; ?>
                @if($counter <= 4) 
                <div class="col-md-3">
                    <div class="probox">
                        <a href="{{ url('/properties/'.$prel->url) }}">
                            <span class="tag_top @if($prel->property_for == 2) rent @else buy @endif">
                                @if($prel->property_for == 2) Rent @else Buy @endif</span>
                            <div class="pro_img">
                                @if(\App\PropertyImage::where('property_id', $prel->id)->count() > 0)
                                @foreach(\App\PropertyImage::where('property_id', $prel->id)->get()->take(1) as
                                $pim_rel)
                                <img src="{{ url('images/frontend/property_images/large/'.$pim_rel->image_name) }}">
                                @endforeach
                                @else
                                <img src="{{ url('images/frontend/property_images/large/default.png') }}">
                                @endif
                            </div>
                            <div class="pro_con">
                                <h5>@foreach(\App\City::where('id', $prel->city)->get() as $c) {{ $c->name }}, @endforeach @foreach(\App\State::where('id', $prel->state)->get() as $s) {{ $s->name }} @endforeach</h5>
                                <p>{{ $prel->name }}</p>
                                <h6>@if($prel->property_for == 2)
                                    AED {{ $prel->property_price }} <span>/Year</span>
                                    @else
                                    AED {{ $prel->property_price }}
                                    @endif</h6>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $prel->bedrooms }}
                                    </li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $prel->bathrooms }}
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
</div>
</section>
</div>
@endforeach

@endsection