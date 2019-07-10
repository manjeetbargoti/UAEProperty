@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><a href="{{ url('admin/new-testimonial') }}" class="label label-lg label-success">Add New</a></h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Testimonials</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">List of Testimonials</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $i = 0 ?>
                                    @foreach($testimonials as $ttm)
                                    <?php $i++ ?>
                                    <td><strong>{{ $i }}</strong></td>
                                    <td><strong>{{ $ttm->user_name }}</strong></td>
                                    <td>{{ $ttm->content}}</td>
                                    <td>{{ date('d M, Y', strtotime($ttm->created_at)) }}</td>
                                    <td>
                                        <div id="donate">

                                            @if($ttm->status == 1)
                                            <a href="{{ url('/admin/testimonial/'.$ttm->id.'/disable') }}" title="Enable"
                                                class="label label-success label-sm">Enable</a>
                                            @else
                                            <a href="{{ url('/admin/testimonial/'.$ttm->id.'/enable') }}" title="Disable"
                                                class="label label-danger label-sm">Disable</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td><a href="{{ url('/admin/testimonial/'.$ttm->id.'/edit') }}" title="Edit"
                                                class="label label-warning label-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/admin/testimonial/'.$ttm->id.'/delete') }}" title="Delete"
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