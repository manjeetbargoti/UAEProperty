@extends('layouts.frontend.home_design_2')
@section('content')

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
                        <li class="nav-item">
                            <a class="tabnav" id="off-plan-tab" data-toggle="tab" href="#offPlan" role="tab"
                                aria-controls="off-plan" aria-selected="false">OFF PLAN</a>
                        </li>
                    </ul>
                    <div class="tab-content searchbg" id="myTabContent">
                        <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                            <form action="{{ url('/search-result') }}" method="post">
                                <div class="search_input">
                                    <input type="hidden" value="1" name="property_type">
                                    <input type="search" name="search_text" id="search_name" class="search_location"
                                        placeholder="Type Location or Project/Society or Keyword">
                                    <button type="submit"><i class="icon ion-md-search"></i></button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                            <form action="{{ url('/search-result') }}" method="post">
                                <div class="search_input">
                                    <input type="hidden" value="2" name="property_type">
                                    <input type="search" name="search_text" id="search_name" class="search_location"
                                        placeholder="Type Location or Project/Society or Keyword">
                                    <button type="submit"><i class="icon ion-md-search"></i></button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div class="tab-pane fade" id="offPlan" role="tabpanel" aria-labelledby="off-plan-tab">
                            <form action="{{ url('/search-result') }}" method="post">
                                <div class="search_input">
                                    <input type="hidden" value="3" name="property_type">
                                    <input type="search" name="search_text" id="search_name" class="search_location"
                                        placeholder="Type Location or Project/Society or Keyword">
                                    <button type="submit"><i class="icon ion-md-search"></i></button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div id="searchlist"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="smart_container">
    <div class="search_mainsec">
        <div class="properties_catlist">
            <div class="container">
                <div class="prop_inn">
                    <div class="protitle_box">
                        <h4>Properties for sale</h4>
                        <h2>In UAE</h2>
                    </div>
                    <div class="proplistbox">
                        <ul>
                            @foreach(\App\PropertyType::where('status', 1)->orderBy('name', 'asc')->get() as $pt)
                            <li>
                                <a href="{{ route('property.category', $pt->url) }}">{{ $pt->name }}
                                    ({{ \App\Property::where('property_type', $pt->type_code)->count() }})</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="property_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="filter_top">
                            <span>Sort By:</span>
                            <select>
                                <option selected>Latest</option>
                                <option value="1">Price: Low to High</option>
                                <option value="2">Price: High to Low</option>
                                <option value="3">Near By</option>
                            </select>
                            <strong><?php echo count($properties); ?> results</strong>
                        </div>
                        <div class="property_list">
                            @if(count($properties) == 0)
                            <div class="pro_con p-3">
                                <p style="text-align: center;"><img src="{{ url('/images/frontend/images/error.png') }}"
                                        alt=""></p>
                                <h5 style="text-align: center;">Sorry, no results found!</h5>
                                <h6 style="text-align: center;">Oh Snap! Zero Results found for your search.</h6>
                            </div>
                            @endif

                            @foreach($properties as $p)
                            <div class="proplist">
                                <div class="proplist_img">
                                    @if(\App\PropertyImage::where('property_id', $p->id)->count() > 0)
                                    @foreach(\App\PropertyImage::where('property_id', $p->id)->take(1)->get() as $pim)
                                    <img src="{{ url('/images/frontend/property_images/large/'.$pim->image_name) }}">
                                    @endforeach
                                    @endif
                                </div>
                                <div class="proplist_item">
                                    <div class="pro_con">
                                        <label
                                            class="badge badge-warning">@foreach(\App\PropertyType::where('type_code',
                                            $p->property_type)->get() as $ptn) {{ $ptn->name }} @endforeach</label>
                                        <label class="badge badge-success">@if($p->property_for == 1) Buy
                                            @elseif($p->property_for == 2) Rent @elseif($p->property_for == 3) Off Plan
                                            @endif</label>
                                        <h5>@foreach(\App\City::where('id', $p->city)->get() as $c) {{ $c->name }},
                                            @endforeach @foreach(\App\State::where('id', $p->state)->get() as $s)
                                            {{ $s->name }} @endforeach</h5>
                                        <p>{{ $p->name }}</p>
                                        <h6>@if($p->property_for == 2)
                                            AED {{ $p->property_price }} <span>/Year</span>
                                            @else
                                            AED {{ $p->property_price }}
                                            @endif</h6>
                                        <ul>
                                            <li>
                                                <img
                                                    src="{{ url('/images/frontend/images/bedroom.svg') }}">{{ $p->bedrooms }}
                                            </li>
                                            <li>
                                                <img
                                                    src="{{ url('/images/frontend/images/bathroom.svg') }}">{{ $p->bathrooms }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="callquiery">
                                    <p>Posted on {{ date('M d, Y', strtotime($p->created_at)) }}</p>
                                    <a href="{{ url('/properties/'.$p->url) }}" class="readmore_btn">Read More</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right_sidebar">
                            <div class="popular_searches">
                                <h4>Popular Searches</h4>
                                <ul>
                                    <li><a href="#">Properties for sale</a></li>
                                    <li><a href="#">Apartments for sale</a></li>
                                    <li><a href="#">Villas for sale</a></li>
                                    <li><a href="#">Townhouses for sale</a></li>
                                    <li><a href="#">Penthouses for sale</a></li>
                                    <li><a href="#">Compounds for sale</a></li>
                                    <li><a href="#">Duplexes for sale</a></li>
                                    <li><a href="#">Land for sale</a></li>
                                    <li><a href="#">Bungalows for sale</a></li>
                                    <li><a href="#">Hotel apartments for sale</a></li>
                                    <li><a href="#">1 bedroom properties for sale</a></li>
                                    <li><a href="#">2 bedroom properties for sale</a></li>
                                    <li><a href="#">3 bedroom properties for sale</a></li>
                                    <li><a href="#">4 bedroom properties for sale</a></li>
                                    <li><a href="#">5 bedroom properties for sale</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="nearby_sec pt-1 pb-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="nearby_txtbox">
                        <h4>Nearby</h4>
                        <h3>Areas</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="proplistbox nearby_item">
                        <ul>
                            <li><a href="#">Buy Properties in Dubai</a></li>
                            <li><a href="#">Buy Properties in Abu Dhabi</a></li>
                            <li><a href="#">Buy Properties in Sharjah</a></li>
                            <li><a href="#">Buy Properties in Ras Al Khaimah</a></li>
                            <li><a href="#">Buy Properties in Ajman</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ url('/images/frontend/images/dubai.png') }}">
                </div>
            </div>
        </div>
    </section>
</div>

@endsection