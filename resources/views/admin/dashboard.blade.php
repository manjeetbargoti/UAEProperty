@extends('layouts.backend.admin_design')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Recent Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Properties</span>
                        <span class="label label-success">Total &nbsp;{{ \App\Property::get()->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Property</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach(\App\Property::orderBy('created_at', 'desc')->take(5)->get() as $p)
                            <li class="item">
                                <div class="product-img">
                                    @foreach(\App\PropertyImage::where('property_id', $p->id)->take(1)->get() as $pim)
                                        <img src="{{ url('/images/frontend/property_images/large/'.$pim->image_name) }}" alt="Product Image">
                                    @endforeach
                                </div>
                                <div class="product-info">
                                    <a href="{{ url('/properties/'.$p->id) }}" target="_blank" class="product-title">{{ str_limit($p->name, $limit=150) }}
                                        <span class="label label-success pull-right">@if($p->property_for == 2)
                                            AED {{ $p->property_price }} <span>/Year</span>
                                            @else
                                            AED {{ $p->property_price }}
                                            @endif</span></a>
                                    <span class="product-description">
                                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ url('/admin/properties') }}" class="uppercase">View All Properties</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection