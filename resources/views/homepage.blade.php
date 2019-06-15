@extends('layouts.frontend.home_design')
@section('content')

<div class="slider">
    <div class="search_sec">
        <div class="search_inn">
            <div class="search_header">
                <p>Click here to search property for buy,sell and rent.</p>
                <button id="showsearch"><img src="{{ asset('images/frontend/images/searchicon.svg') }}"></button>
            </div>
            <div class="searchbox" style="display: none;">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="tabnav active" id="buy-tab" data-toggle="tab" href="#buy" role="tab"
                            aria-controls="buy" aria-selected="true">BUY</a>
                    </li>
                    <li class="nav-item">
                        <a class="tabnav" id="rent-tab" data-toggle="tab" href="#rent" role="tab" aria-controls="rent"
                            aria-selected="false">RENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="tabnav" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell"
                            aria-selected="false">OFF PLAN</a>
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
                    <div class="tab-pane fade" id="sell" role="tabpanel" aria-labelledby="sell-tab">
                        <div class="search_input">
                            <input type="search" placeholder="Search State, City or Area">
                            <button type="submit"><i class="icon ion-md-search"></i></button>
                        </div>
                    </div>
                </div>
                <button id="hidesearch"><i class="icon ion-md-close"></i></button>
            </div>
        </div>
    </div>
    <div class="carousel-caption custom_caption text-left">
        <h1>Search for property</h1>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators custom_indicator">
            <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleFade" data-slide-to="1"></li>
            <li data-target="#carouselExampleFade" data-slide-to="2"></li>
        </ol>
        <span class="overlay"></span>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image:url('images/frontend/images/slide1.jpg');">
            </div>
            <div class="carousel-item" style="background-image:url('images/frontend/images/slide2.jpg');">
            </div>
            <div class="carousel-item" style="background-image:url('images/frontend/images/slide3.jpg');">
            </div>
        </div>
    </div>
</div>

<div id="smart_container">
    <!-- Featured Property Section Starts -->
    <section class="feature_sec">
        <div class="container">
            <div class="headding">
                <h1>Featured <span>Property</span></h1>
            </div>
            <!-- Featured Property for Rent Section Starts -->
            <div class="row">
                <?php $counter = 0; ?>
                @foreach($properties as $p)
                @if($p->featured == 1 && $p->property_for == 2)
                <?php $counter++ ?>
                @if($counter <= 3) <div class="col-md-4">
                    <div class="probox">
                        <a href="{{ url('/properties/'.$p->url) }}">
                            <span class="tag_top @if($p->property_for == 2) rent @else buy @endif">
                                @if($p->property_for == 2) Rent @else Buy @endif
                            </span>
                            <div class="pro_img">
                                @if(!empty($p->image_name))
                                <img src="{{ url('images/frontend/property_images/large/'.$p->image_name) }}">
                                @else
                                <img src="{{ url('images/frontend/property_images/large/default.png') }}">
                                @endif
                            </div>
                            <div class="pro_con">
                                <h5>{{ $p->city_name }}, {{ $p->state_name }}</h5>
                                @foreach(\App\PropertyType::where('type_code', $p->property_type)->get() as $ptn) <a
                                    class="badge badge-warning badge-sm"
                                    href="{{ url('/category/'.$ptn->url) }}">{{ $ptn->name }}</a> @endforeach
                                <p>{{ $p->name }}</p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $p->bedrooms }}
                                    </li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $p->bathrooms }}
                                    </li>
                                </ul>
                                <h6>@if($p->property_for == 2)
                                    AED {{ $p->property_price }} <span>/Year</span>
                                    @else
                                    AED {{ $p->property_price }}
                                    @endif
                                </h6>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            <!-- /.Featured Property for Rent Section Ends -->

            <!-- Featured Property for Buy Section Starts -->
            <div class="row">
                <?php $counter = 0; ?>
                @foreach($properties as $p)
                @if($p->featured == 1 && $p->property_for == 1)
                <?php $counter++ ?>
                @if($counter <= 3) <div class="col-md-4">
                    <div class="probox">
                        <a href="{{ url('/properties/'.$p->url) }}">
                            <span class="tag_top @if($p->property_for == 2) rent @else buy @endif">
                                @if($p->property_for == 2) Rent @else Buy @endif
                            </span>
                            <div class="pro_img">
                                @if(!empty($p->image_name))
                                <img src="{{ url('images/frontend/property_images/large/'.$p->image_name) }}">
                                @else
                                <img src="{{ url('images/frontend/property_images/large/default.png') }}">
                                @endif
                            </div>
                            <div class="pro_con">
                                <h5>{{ $p->city_name }}, {{ $p->state_name }}</h5>
                                @foreach(\App\PropertyType::where('type_code', $p->property_type)->get() as $ptn) <a
                                    class="badge badge-warning badge-sm"
                                    href="{{ url('/category/'.$ptn->url) }}">{{ $ptn->name }}</a> @endforeach
                                <p>{{ $p->name }}</p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $p->bedrooms }}
                                    </li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $p->bathrooms }}
                                    </li>
                                </ul>
                                <h6>@if($p->property_for == 2)
                                    AED {{ $p->property_price }} <span>/Year</span>
                                    @else
                                    AED {{ $p->property_price }}
                                    @endif
                                </h6>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            <!-- /.Featured Property for Buy Section Ends -->

            <!-- Featured Property for Off Plan Section Starts -->
            <div class="row">
                <?php $counter = 0; ?>
                @foreach($properties as $p)
                @if($p->featured == 1 && $p->property_for == 3)
                <?php $counter++ ?>
                @if($counter <= 3) <div class="col-md-4">
                    <div class="probox">
                        <a href="{{ url('/properties/'.$p->url) }}">
                            <span
                                class="tag_top @if($p->property_for == 2) rent @elseif($p->property_for == 1) buy @else sell @endif">
                                @if($p->property_for == 2) Rent @elseif($p->property_for == 1) Buy @else OFF PLAN @endif
                            </span>
                            <div class="pro_img">
                                @if(!empty($p->image_name))
                                <img src="{{ url('images/frontend/property_images/large/'.$p->image_name) }}">
                                @else
                                <img src="{{ url('images/frontend/property_images/large/default.png') }}">
                                @endif
                            </div>
                            <div class="pro_con">
                                <h5>{{ $p->city_name }}, {{ $p->state_name }}</h5>
                                @foreach(\App\PropertyType::where('type_code', $p->property_type)->get() as $ptn) <a
                                    class="badge badge-warning badge-sm"
                                    href="{{ url('/category/'.$ptn->url) }}">{{ $ptn->name }}</a> @endforeach
                                <p>{{ $p->name }}</p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $p->bedrooms }}
                                    </li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $p->bathrooms }}
                                    </li>
                                </ul>
                                <h6>@if($p->property_for == 2)
                                    AED {{ $p->property_price }} <span>/Year</span>
                                    @else
                                    AED {{ $p->property_price }}
                                    @endif
                                </h6>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            <!-- /.Featured Property for Offplan Section Ends -->
        </div>
    </section>
    <!-- /.Featured Property Section Ends -->

    <!-- Property By State Starts -->
    <section class="country_sec">
        <div class="d-sm-flex flex-row">
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="{{ url('/property/48003/al-quoz') }}">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city1.jpg') }}">
                        <div class="count_txt">
                            <h2>AL QUOZ</h2>
                            <p>Check out some of the latest and
                                best properties in Al Quoz.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="{{ url('/property/47987/dubai-city') }}">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city2.jpg') }}">
                        <div class="count_txt">
                            <h2>DUBAI CITY</h2>
                            <p>Check out some of the latest and
                                best properties in Dubai City.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="{{ url('/property/48008/hatta') }}">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city3.jpg') }}">
                        <div class="count_txt">
                            <h2>HATTA</h2>
                            <p>Check out some of the latest and
                                best properties in Hatta.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="{{ url('/property/48064/arjan') }}">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city4.jpg') }}">
                        <div class="count_txt">
                            <h2>ARJAN</h2>
                            <p>Check out some of the latest and
                                best properties in Arjan.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Property By State Ends -->

    <!-- Latest Property Listing Section Starts -->
    <section class="property_sec">
        <div class="container">
            <div class="headding">
                <h1><span>Latest</span> Property <span>Listing</span></h1>
            </div>
            <div class="row">
                <?php $counter = 0; ?>
                @foreach($properties as $p)
                <?php $counter++ ?>
                @if($counter <= 6) <div class="col-md-4">
                    <div class="probox">
                        <a href="{{ url('/properties/'.$p->url) }}">
                            <span
                                class="tag_top @if($p->property_for == 2) rent @elseif($p->property_for == 1) buy @else sell @endif">
                                @if($p->property_for == 2) Rent @elseif($p->property_for == 1) Buy @else OFF PLAN @endif
                            </span>

                            <div class="pro_img">
                                @if(!empty($p->image_name))
                                <img src="{{ url('images/frontend/property_images/large/'.$p->image_name) }}">
                                @else
                                <img src="{{ url('images/frontend/property_images/large/default.png') }}">
                                @endif
                            </div>
                            <div class="pro_con">
                                <h5>{{ $p->city_name }}, {{ $p->state_name }}</h5>
                                @foreach(\App\PropertyType::where('type_code', $p->property_type)->get() as $ptn) <a
                                    class="badge badge-warning badge-sm"
                                    href="{{ url('/category/'.$ptn->url) }}">{{ $ptn->name }}</a> @endforeach
                                <p>{{ $p->name }}</p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $p->bedrooms }}</li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $p->bathrooms }}</li>
                                </ul>
                                <h6>@if($p->property_for == 2)
                                    AED {{ $p->property_price }} <span>/Year</span>
                                    @else
                                    AED {{ $p->property_price }}
                                    @endif
                                </h6>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- /.Latest Property Listing Section Ends -->

    <!-- Blog Section Starts -->
    <section class="blogsec">
        <div class="container">
            <div class="blog_headding mob">
                <h2>Form The <span>Blog</span></h2>
            </div>
            <div class="row">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="owl-carousel blog-carousel work-class1" id="work-class1">
                                @foreach(\App\Post::orderBy('created_at', 'desc')->get() as $pim)
                                <div class="item">
                                    <img src="{{ url('images/frontend/post_images/small/'.$pim->post_image) }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog_headding web">
                                <h2>Form The <br /><span>Blog</span></h2>
                            </div>
                            <div class="owl-carousel work-class2" id="work-class2">
                                @foreach(\App\Post::orderBy('created_at', 'desc')->get() as $p)
                                <div class="item">
                                    <div class="blog_txt">
                                        <h6>{{ date('M d, Y', strtotime($p->created_at)) }}</h6>
                                        <p>{{ $p->title }}</p>
                                        <a href="{{ url('/blog/'.$p->url) }}">
                                            <h5>Read More <i class="icon ion-md-arrow-forward"></i></h5>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Blog Section Ends -->

    <!-- Testtimonial Section Starts -->
    <section class="testimonials_sec">
        <div class="container">
            <div class="headding">
                <h1>Testimonials</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="owl-carousel testimonial-slider">
                        @foreach(\App\Testimonial::where('status', 1)->orderBy('created_at', 'desc')->get() as $ttm)
                        <div class="item">
                            <div class="testimonials_box">
                                <div class="user_testimonial">
                                    <img src="{{ url('/images/frontend/testimonial_images/large/'.$ttm->user_image) }}">
                                </div>
                                <q>
                                    {{ $ttm->content }}
                                </q>
                                <p>{{ $ttm->user_name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Testimonial Section Ends -->

    <!-- Subscribe Section Starts -->
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
    <!-- /.Subscribe Section Ends -->
</div>

@endsection