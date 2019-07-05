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
    <section class="pt-1 pb-1">
        <div class="breadcrumb_sec">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb custom_breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/properties') }}">Properties</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $property->name }}</li>
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
                        <h5>{{ $property->name }}</h5>
                        <p>{{ $property->name }}</p>
                    </div>
                    <div class="col-md-5">
                        <div class="share_query">
                            <div class="callquery">
                                <a href="#"><img src="{{ url('/images/frontend/images/mail.svg') }}"></a>
                                <a href="#"><img src="{{ url('/images/frontend/images/wp.svg') }}"></a>
                                <a href="#"><img src="{{ url('/images/frontend/images/call.svg') }}"></a>
                            </div>
                            <a href="#" class="enquirebtn" data-toggle="modal" data-target="#getQuerymodal"><i
                                    class="fa fa-info"></i>Enquire Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="demo">
                <div class="item">
                    <div class="clearfix">
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                            @if(!empty($property->images[0]->thumb->link))
                            @foreach($property->images as $pim)
                            <li style="text-align: center;background:#f8f8f8;" height="100" width="200"
                                data-thumb="{{ $pim->medium->link }}">
                                <img height="450" src="{{ $pim->full->link }}" />
                            </li>
                            @endforeach
                            @else
                            @foreach(\App\PropertyImage::where('property_id', $property->id)->get() as $pim)
                            <li style="text-align: center;background: #f8f8f8;"
                                data-thumb="{{ url('/images/frontend/property_images/large/'.$pim->image_name) }}">
                                <img src="{{ url('/images/frontend/property_images/large/'.$pim->image_name) }}" />
                            </li>
                            @endforeach
                            @endif
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
                    <div class="prop_table @if($property->property_for == 3) d-none @endif">
                        <h5>FACTS</h5>
                        <table class="table-responsive table table-bordered ">
                            <tbody>
                                <tr>
                                    <td scope="row">Price</td>
                                    <td>@if($property->property_for == 2)
                                        AED {{ $property->property_price }}
                                        @elseif($property->property_for == 1) 
                                        AED {{ $property->property_price }} 
                                        @endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Type</td>
                                    <td>@if(!empty($property->property_type)){{ $property->property_type }}@endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Property Code</td>
                                    <td>@if(!empty($property->property_code)){{ $property->property_code }}@endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Bedrooms</td>
                                    <td>@if(!empty($property->bedrooms)){{ $property->bedrooms }}@endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Bathrooms</td>
                                    <td>@if(!empty($property->bathrooms)){{ $property->bathrooms }}@endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Parkings</td>
                                    <td>@if(!empty($property->parking)){{ $property->parking }}@endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Furnishings</td>
                                    <td>@if($property->furnish_type == 'F') Full Furnished @elseif($property->furnish_type == 'U') Unfurnished @elseif($property->furnish_type == 'S') Semi-Furnished @endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Area</td>
                                    <td>@if(!empty($property->property_area)){{ $property->property_area }} sqft. @endif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prop_table @if($property->property_for == 3) d-none @endif">
                        <h5>AMENITIES</h5>
                        <div class="amenties">
                            <ul>
                            @if(!empty($property->am))
                                @foreach($property->am as $am)
                                <li>{{ $am->name }}</li>
                                @endforeach
                            @else
                            @foreach(explode(',', $property->amenities) as $am)
                                @foreach(\App\Amenity::where('amenity_code', $am)->get() as $amn)
                                <li>{{ $amn->name }}</li>
                                @endforeach
                            @endforeach
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <p>{!! $property->description !!}</p>
        </div>
    </section>

    <section class="property_sec">
        <div class="container">
            <h3 class="mb-3">More available in {{ $property->state_name }} </h3>
            <div class="row">
                <?php $counter = 0; ?>
                @foreach($property_all as $prel)
                @if($prel->location->city == $property->state_name)
                <?php $counter++; ?>
                @if($counter <= 4)
                <div class="col-md-3">
                    <div class="probox">
                        <a href="{{ url('/properties/'.$prel->id) }}">
                            <span
                                class="tag_top @if($prel->price->offering_type == 'rent') rent @elseif($prel->price->offering_type == 'sale') sell @endif">
                                {{ $prel->price->offering_type }}</span>
                            <div class="pro_img">
                                <img height="190" src="{{ $prel->images[0]->medium->link }}">
                            </div>
                            <div class="pro_con">
                                <h5>{{ str_limit($prel->location->community, $limit=13) }}, {{ $prel->location->city }}</h5> 
                                <a class="badge badge-warning badge-sm" href="{{ url('/properties/'.$prel->type->name) }}">
                                    {{ $prel->type->name }}
                                </a>
                                <p>{{ $prel->languages[0]->title }}</p>
                                <h6>@if($prel->price->offering_type == 'rent')AED {{ $prel->price->prices[0]->value }} <span>/{{ $prel->price->prices[0]->period }}</span>@elseif($prel->price->offering_type == 'sale') AED {{ $prel->price->value }} @endif</h6>
                                <ul>
                                    @if(!empty($prel->bedrooms))<li><img src="{{ url('images/frontend/images/bedroom.svg') }}">{{ $prel->bedrooms }}
                                    </li>@endif
                                    @if(!empty($prel->bathrooms))<li><img
                                            src="{{ url('images/frontend/images/bathroom.svg') }}">{{ $prel->bathrooms }}
                                    </li>@endif
                                </ul>
                            </div>
                        </a>
                    </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
</div>
</section>

</div>

<!-- Modal Enquire -->
<div class="modal fade" id="getQuerymodal" tabindex="-1" role="dialog" aria-labelledby="getQuerymodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="getQuerymodalTitle">Enquire Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="enquiry_form" id="EnquiryForm"
                    action="{{ url('/properties/'.$property->id) }}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Full Name">Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="full_name"
                                placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Phone Number">Contact Number</label>
                            <input type="tel" class="form-control" name="phone" id="phoneno" placeholder="Phone no.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email Address">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="prop_name" id="prop_name"
                            value="{{ $property->name }}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="prop_url" id="prop_url"
                            value="{{ url('/properties/'.$property->id) }}">
                    </div>
                    <div class="form-group">
                        <label for="Enquiry Details">Enquery Details</label>
                        <textarea class="form-control" id="enquiry_message" name="enquiry_message" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Enquire End -->

@endsection