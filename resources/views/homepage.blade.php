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
                            aria-selected="false">Rent</a>
                    </li>
                    <li class="nav-item">
                        <a class="tabnav" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell"
                            aria-selected="false">Sell</a>
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
    <section class="feature_sec">
        <div class="container">
            <div class="headding">
                <h1>Feature <span>Property</span></h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="probox">
                        <a href="#">
                            <div class="pro_img">
                                <img src="{{ url('images/frontend/images/pro1.jpg') }}">
                            </div>
                            <div class="pro_con">
                                <h5>Al Khawaneej, Dubai</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">2</li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">1</li>
                                </ul>
                                <h6>AED 80,000 <span>Year</span></h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probox">
                        <a href="#">
                            <div class="pro_img">
                                <img src="{{ url('images/frontend/images/pro2.jpg') }}">
                            </div>
                            <div class="pro_con">
                                <h5>Al Khawaneej, Dubai</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">2</li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">1</li>
                                </ul>
                                <h6>AED 80,000 <span>Year</span></h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probox">
                        <a href="#">
                            <div class="pro_img">
                                <img src="{{ url('images/frontend/images/pro3.jpg') }}">
                            </div>
                            <div class="pro_con">
                                <h5>Al Khawaneej, Dubai</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">2</li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">1</li>
                                </ul>
                                <h6>AED 80,000 <span>Year</span></h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="country_sec">
        <div class="d-sm-flex flex-row">
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="#">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city1.jpg') }}">
                        <div class="count_txt">
                            <h2>Water Villa</h2>
                            <p>Check out some of the latest and
                                best properties published on our website.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="#">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city2.jpg') }}">
                        <div class="count_txt">
                            <h2>Dubai Marina</h2>
                            <p>Check out some of the latest and
                                best properties published on our website.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="#">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city3.jpg') }}">
                        <div class="count_txt">
                            <h2>Hattan 2</h2>
                            <p>Check out some of the latest and
                                best properties published on our website.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex-fill">
                <div class="countrybox">
                    <a href="#">
                        <span class="count_overlay"></span>
                        <img src="{{ url('images/frontend/images/city4.jpg') }}">
                        <div class="count_txt">
                            <h2>Damac Hills</h2>
                            <p>Check out some of the latest and
                                best properties published on our website.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="property_sec">
        <div class="container">
            <div class="headding">
                <h1>Property <span>Listing</span></h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="probox">
                        <a href="#">
                            <span class="tag_top rent">Rent</span>
                            <div class="pro_img">
                                <img src="{{ url('images/frontend/images/pro1.jpg') }}">
                            </div>
                            <div class="pro_con">
                                <h5>Al Khawaneej, Dubai</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">2</li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">1</li>
                                </ul>
                                <h6>AED 80,000 <span>Year</span></h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probox">
                        <a href="#">
                            <span class="tag_top sell">Sell</span>
                            <div class="pro_img">
                                <img src="{{ url('images/frontend/images/pro2.jpg') }}">
                            </div>
                            <div class="pro_con">
                                <h5>Al Khawaneej, Dubai</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">2</li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">1</li>
                                </ul>
                                <h6>AED 80,000 <span>Year</span></h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probox">
                        <a href="#">
                            <span class="tag_top buy">Rent</span>
                            <div class="pro_img">
                                <img src="{{ url('images/frontend/images/pro3.jpg') }}">
                            </div>
                            <div class="pro_con">
                                <h5>Al Khawaneej, Dubai</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                <ul>
                                    <li><img src="{{ url('images/frontend/images/bedroom.svg') }}">2</li>
                                    <li><img src="{{ url('images/frontend/images/bathroom.svg') }}">1</li>
                                </ul>
                                <h6>AED 80,000 <span>Year</span></h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                <div class="item">
                                    <img src="{{ url('images/frontend/images/blog1.jpg') }}">
                                </div>
                                <div class="item">
                                    <img src="{{ url('images/frontend/images/blog1.jpg') }}">
                                </div>
                                <div class="item">
                                    <img src="{{ url('images/frontend/images/blog1.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog_headding web">
                                <h2>Form The <br /><span>Blog</span></h2>
                            </div>
                            <div class="owl-carousel work-class2" id="work-class2">
                                <div class="item">
                                    <div class="blog_txt">
                                        <h6>May 2,2019</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. </p>
                                        <a href="#">
                                            <h5>Read More <i class="icon ion-md-arrow-forward"></i></h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="blog_txt">
                                        <h6>May 2,2019</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. </p>
                                        <a href="#">
                                            <h5>Read More <i class="icon ion-md-arrow-forward"></i></h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="blog_txt">
                                        <h6>May 2,2019</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. </p>
                                        <a href="#">
                                            <h5>Read More <i class="icon ion-md-arrow-forward"></i></h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
</div>

@endsection