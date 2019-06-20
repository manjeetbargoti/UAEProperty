@extends('layouts.backend.admin_design')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Banner</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit Banner</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="box box-success">
                    <!-- form start -->
                    <form role="form" enctype="multipart/form-data" name="edit_banner" id="edit_banner" method="POST"
                        action="{{ url('/admin/banner/'.$banners->id.'/edit') }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Banner Image</label> <span class="badge label-success badge-sm">image
                                            size: 1920 x 975</span>
                                        <input type="hidden" name="current_image" multiple id="image" value="{{ $banners->image }}">
                                        <input type="file" name="banner_image" id="banner_image" class="form-control">
                                    </div>
                                    <p><img width="200" src="{{ url('/images/frontend/banner/large/'.$banners->image) }}" alt=""></p>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Title Text</label> <span class="badge label-success badge-sm">it can be
                                            your category..</span>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $banners->title }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" name="banner_link" id="banner_link" class="form-control" value="{{ $banners->link }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Description</label> <span class="badge label-success badge-sm">Max. 150 words</span>
                                        <textarea name="description" id="description" rows="2" class="form-control">{{ $banners->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Update Banner</button>
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