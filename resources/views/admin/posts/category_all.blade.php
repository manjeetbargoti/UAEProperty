@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><a href="{{ url('admin/new-category') }}" class="label label-lg label-success">Add New</a></h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">List of Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Parent Cat</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $i = 0 ?>
                                    @foreach($categories as $cat)
                                    <?php $i++ ?>
                                    <td>{{ $i }}</td>
                                    <td>@if(!empty($cat->cat_image))<img src="{{ url('/images/frontend/post_images/category/large/'.$cat->cat_image) }}" width="60" alt="{{ $cat->name }}">@endif</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->url }}</td>
                                    <td>@if($cat->parent_cat != 0) @foreach(\App\PostCategory::where('id', $cat->parent_cat)->get() as $pcat_name) {{ $pcat_name->name }} @endforeach @else Main @endif</td>
                                    <td>{{ date('d M, Y', strtotime($cat->created_at)) }}</td>
                                    <td>
                                        <div id="donate">

                                            @if($cat->status == 1)
                                            <a href="{{ url('/admin/category/'.$cat->id.'/disable') }}" title="Enable"
                                                class="label label-success label-sm">Enable</a>
                                            @else
                                            <a href="{{ url('/admin/category/'.$cat->id.'/enable') }}" title="Disable"
                                                class="label label-danger label-sm">Disable</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/category/'.$cat->id.'/edit') }}" class="label label-warning label-lg"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/admin/category/'.$cat->id.'/delete') }}" class="label label-danger label-lg"><i class="fa fa-trash"></i></a>
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