@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Add New Banner</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Add Banner</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="box box-success">
                    <!-- form start -->
                    <form role="form" enctype="multipart/form-data" name="add_banner" id="add_banner" method="POST"
                        action="{{ url('/admin/new-banners') }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Banner Image</label> <span class="badge label-success badge-sm">image
                                            size: 1920 x 975</span>
                                            <span id="error_img" class="pull-right"></span>
                                        <input type="file" name="banner_image" id="banner_image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Title Text</label> <span class="badge label-success badge-sm">Max 100 words</span>
                                        <span id="error_msg" class="pull-right"></span>
                                        <input type="text" name="title" id="bannerTitle" maxlength="100" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" name="banner_link" id="banner_link" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Description</label> <span class="badge label-success badge-sm">Max. 150 words</span>
                                        <textarea name="description" maxlength="150" id="description" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" id="AddBanner" class="btn btn-info pull-right">Add Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection