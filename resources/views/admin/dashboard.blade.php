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
                        <span class="info-box-number">200</small></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Home Loan Query</span>
                        <a href="#" class="user-count"><label class="btn btn-success btn-xs">Total
                                &nbsp;&nbsp;20</label></a>
                        <a href="#" class="user-count"><label class="btn btn-danger btn-xs">Pending
                                &nbsp;&nbsp;4</label></a>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-help"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Property Query</span>
                        <a href="#" class="user-count"><label class="btn btn-success btn-xs">Total
                                &nbsp;&nbsp;21</label></a>
                        <a href="#" class="user-count"><label class="btn btn-danger btn-xs">Pending
                                &nbsp;&nbsp;12</label></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <a href="{{ url('/admin/users') }}" class="user-count"><label class="btn btn-info btn-xs">Total
                                &nbsp;&nbsp;123</label></a>
                        <a href="#" class="user-count"><label class="btn btn-success btn-xs">Active
                                &nbsp;&nbsp;100</label></a>
                        <a href="#" class="user-count"><label class="btn btn-danger btn-xs">Inactive
                                &nbsp;&nbsp;23</label></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
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
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset('dist/img/default-50x50.gif') }}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Samsung TV
                                        <span class="label label-warning pull-right">$1800</span></a>
                                    <span class="product-description">
                                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset('dist/img/default-50x50.gif') }}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Bicycle
                                        <span class="label label-info pull-right">$700</span></a>
                                    <span class="product-description">
                                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset('dist/img/default-50x50.gif') }}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Xbox One <span
                                            class="label label-danger pull-right">$350</span></a>
                                    <span class="product-description">
                                        Xbox One Console Bundle with Halo Master Chief Collection.
                                    </span>
                                </div>
                            </li>

                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Proerty</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Members</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger">8 New Members</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            <li>
                                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                <span class="users-list-date">Today</span>
                            </li>
                            <li>
                                <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">Norman</a>
                                <span class="users-list-date">Yesterday</span>
                            </li>
                            <li>
                                <img src="{{ asset('dist/img/user7-128x128.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">Jane</a>
                                <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                                <img src="{{ asset('dist/img/user6-128x128.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">John</a>
                                <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">Alexander</a>
                                <span class="users-list-date">13 Jan</span>
                            </li>
                            <li>
                                <img src="{{ asset('dist/img/user5-128x128.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">Sarah</a>
                                <span class="users-list-date">14 Jan</span>
                            </li>
                            <li>
                                <img src="{{ asset('dist/img/user4-128x128.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">Nora</a>
                                <span class="users-list-date">15 Jan</span>
                            </li>
                            <li>
                                <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Image">
                                <a class="users-list-name" href="#">Nadia</a>
                                <span class="users-list-date">15 Jan</span>
                            </li>
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Users</a>
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