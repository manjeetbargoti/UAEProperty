@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><a href="{{ url('admin/add-property') }}" class="label label-lg label-success">Add New</a></h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Property List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">List of Properties</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Listed For</th>
                                    <th>Price</th>
                                    <th>Amenities</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $i = 0 ?>
                                    @foreach($properties as $p)
                                    <?php $i++ ?>
                                    <td>{{ $i }}</td>
                                    <td>@if(!empty($p->image_name)) <img src="{{ url('images/frontend/property_images/large/'.$p->image_name) }}" width="60" alt="{{ $p->name }}"> @endif</td>
                                    <td><a href="{{ url('/properties/'.$p->url) }}">{{ $p->name}}</a></td>
                                    <td>@if($p->property_for == 1) Buy @else Sale @endif</td>
                                    <td>AED {{ $p->property_price }}</td>
                                    <td>{{ $p->amenities }}</td>
                                    <td>
                                        <div id="donate">
                                            <a href="#" title="Edit" class="label label-success label-sm">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Listed For</th>
                                    <th>Price</th>
                                    <th>Amenities</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
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