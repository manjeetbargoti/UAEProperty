@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><a href="{{ url('admin/new-post') }}" class="label label-lg label-success">Add New</a></h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Posts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">List of Posts</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $i = 0 ?>
                                    @foreach($posts as $p)
                                    <?php $i++ ?>
                                    <td>{{ $i }}</td>
                                    <td>@if(!empty($p->post_image))<img
                                            src="{{ url('/images/frontend/post_images/large/'.$p->post_image) }}"
                                            width="100" alt="{{ $p->title }}">@endif</td>
                                    <td><a target="_blank" href="{{ url('/blog/'.$p->url) }}"><strong>{{ $p->title }}</strong></a></td>
                                    <td>@if(!empty($p->post_cat))@foreach(\App\PostCategory::where('id', $p->post_cat)->get() as $pcat){{ $pcat->name }} @endforeach @endif</td>
                                    <td>{{ date('d M, Y', strtotime($p->created_at)) }}</td>
                                    <td>
                                        <div id="donate">

                                            @if($p->status == 1)
                                            <a href="{{ url('/admin/post/draft/'.$p->id) }}" title="Publish"
                                                class="label label-success label-sm">Publish</a>
                                            @else
                                            <a href="{{ url('/admin/post/publish/'.$p->id) }}" title="Draft"
                                                class="label label-danger label-sm">Draft</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/post/'.$p->id.'/edit') }}" class="label label-warning label-lg"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/admin/post/'.$p->id.'/delete') }}" class="label label-danger label-lg"><i class="fa fa-trash"></i></a>
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

<script>

</script>

@endsection