@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><a href="{{ url('admin/new-banners') }}" class="label label-lg label-success">Add New</a></h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Banners</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">List of Banners</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $i = 0 ?>
                                    @foreach($banners as $bn)
                                    <?php $i++ ?>
                                    <td><strong>{{ $i }}</strong></td>
                                    <td><img width="200" src="{{ url('/images/frontend/banner/large/'.$bn->image) }}" alt=""></td>
                                    <td><a href="{{ $bn->link }}">{{ $bn->title}}</a></td>
                                    <td>{{ $bn->description }}</td>
                                    <td>
                                        <div id="donate">

                                            @if($bn->status == 1)
                                            <a href="/admin/banner/{{ $bn->id }}/disable" title="Disable"
                                                class="label label-success label-sm">Enable</a>
                                            @else
                                            <a href="/admin/banner/{{ $bn->id }}/enable" title="Enable"
                                                class="label label-danger label-sm">Disable</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td><a href="{{ url('/admin/banner/'.$bn->id.'/edit') }}" title="Edit"
                                                class="label label-warning label-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/admin/banner/'.$bn->id.'/delete') }}" title="Delete"
                                                class="label label-danger label-sm"><i class="fa fa-trash"></i></a>
                                            
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection