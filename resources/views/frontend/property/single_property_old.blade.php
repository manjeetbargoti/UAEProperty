@extends('layouts.frontend.home_design_2')
@section('content')

@foreach($property as $p)
<div id="smart_container">
    <section class="pt-5 pb-1">
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
            <div class="row">
                <div class="col-md-6">
                    <div class="demo">
                        <div class="item">
                            <div class="clearfix">
                                @if(\App\PropertyImage::where('property_id', $p->id)->count() > 0)
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach(\App\PropertyImage::where('property_id', $p->id)->get() as $pim)
                                    <li
                                        data-thumb="{{ url('images/frontend/property_images/large/'.$pim->image_name) }}">
                                        <img
                                            src="{{ url('images/frontend/property_images/large/'.$pim->image_name) }}" />
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <img src="{{ url('images/frontend/property_images/large/default.png') }}"
                                    alt="{{ $p->name }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pro_details">
                        <div class="pro_con p-0">
                            <h5>{{ $p->city_name }}, {{ $p->state_name }}</h5>
                            <p>{{ $p->name }}</p>
                            <ul>
                                <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $p->bedrooms }}</li>
                                <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $p->bathrooms }}</li>
                            </ul>
                            <h6>@if($p->property_for == 2)
                                AED {{ $p->property_price }} <span>/Year</span>
                                @else
                                AED {{ $p->property_price }}
                                @endif</h6>
                            <button type="button" class="btn btn-dark">Enquiry Now</button>
                        </div>

                        <div class="prodescription">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-amenities-tab" data-toggle="pill"
                                        href="#pills-amenities" role="tab" aria-controls="pills-menities"
                                        aria-selected="true">Amenities</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-specifications-tab" data-toggle="pill"
                                        href="#pills-specifications" role="tab" aria-controls="pills-specifications"
                                        aria-selected="false">Specifications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-amenities" role="tabpanel"
                                    aria-labelledby="pills-amenities-tab">
                                    <div class="amenties_box">
                                        <ul>
                                            @foreach(explode(',', $p->amenities) as $am)
                                                @foreach(\App\Amenity::where('amenity_code', $am)->get() as $amenity)
                                                <li>{{ $amenity->name }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-specifications" role="tabpanel"
                                    aria-labelledby="pills-specifications-tab" style="overflow:scroll; height: 21em;">
                                    <p>
                                        {!! $p->description !!}
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="property_sec">
        <div class="container">
            <div class="headding">
                <h1>Related <span>Property</span></h1>
            </div>
            <div class="row">
                <?php $counter = 0; ?>
                @foreach(\App\property::where('city', $p->city)->orWhere('state', $p->state)->inRandomOrder()->get() as $prel)
                <?php $counter++; ?>
                @if($counter <= 3) <div class="col-md-4">
                    <div class="probox">
                        <a href="{{ $prel->url }}">
                            <span class="tag_top @if($prel->property_for == 2) rent @else buy @endif">
                                @if($prel->property_for == 2) Rent @else Buy @endif
                            </span>
                            <div class="pro_img">
                                @if(\App\PropertyImage::where('property_id', $prel->id)->count() > 0)
                                @foreach(\App\PropertyImage::where('property_id', $prel->id)->get()->take(1) as $pim_rel)
                                    <img src="{{ url('images/frontend/property_images/large/'.$pim_rel->image_name) }}">
                                @endforeach
                                @else
                                    <img src="{{ url('images/frontend/property_images/large/default.png') }}">
                                @endif
                            </div>
                            <div class="pro_con">
                                <h5>@foreach(\App\City::where('id', $prel->city)->get() as $c) {{ $c->name }}, @endforeach @foreach(\App\State::where('id', $prel->state)->get() as $s) {{ $s->name }} @endforeach</h5>
                                <p>{{ $prel->name }}</p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $prel->bedrooms }}
                                    </li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $prel->bathrooms }}
                                    </li>
                                </ul>
                                <h6>@if($prel->property_for == 2)
                                    AED {{ $prel->property_price }} <span>/Year</span>
                                    @else
                                    AED {{ $prel->property_price }}
                                    @endif</h6>
                            </div>
                        </a>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
</div>
</section>
@endforeach

<section class="subscribe_sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="subscribe_text">
                    <h1>Subscribe Now</h1>
                    <p>Subscribe to our newsletters and be the first to know about exclusive deals,
                        property price trends and real estate news in the UAE.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="subscribe_form">
                    <form>
                        <input type="email" placeholder="enter your email">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection