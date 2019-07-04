@extends('layouts.frontend.home_design_2')
@section('content')

@foreach($property as $property)

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
                            <li style="text-align: center;background:#f8f8f8;" height="100" width="200" data-thumb="{{ $pim->medium->link }}">
                                <img height="450" src="{{ $pim->full->link }}" />
                            </li>
                            @endforeach
                            @else
                            @foreach(\App\PropertyImage::where('property_id', $p->id)->get() as $pim)
                            <li style="text-align: center;background: #f8f8f8;" data-thumb="{{ url('/images/frontend/property_images/large/'.$pim->image_name) }}">
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
                                    <td>@if($property->price->offering_type == 'rent')AED
                                        {{ $property->price->prices[0]->value }}
                                        <span>/{{ $property->price->prices[0]->period }}</span>@elseif($property->price->offering_type
                                        == 'sale') AED {{ $property->price->value }} @endif</td>
                                </tr>
                                <tr>
                                    <td scope="row">Type</td>
                                    <td>{{ $property->property_type }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Property Code</td>
                                    <td>{{ $property->property_code }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Bedrooms</td>
                                    <td>{{ $property->bedrooms }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Bathrooms</td>
                                    <td>{{ $property->bathrooms }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Furnishings</td>
                                    <td>{{ $property->furnished }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Area</td>
                                    <td>{{ $property->property_area }} sqft.</td>
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
                                @foreach($property->amenities as $am)
                                <li>{{ $am->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <p>{!! $property->languages[0]->description !!}</p>
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
                <form method="post" class="enquiry_form" id="EnquiryForm" action="{{ url('/properties/'.$property->id) }}">
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

@endforeach

@endsection