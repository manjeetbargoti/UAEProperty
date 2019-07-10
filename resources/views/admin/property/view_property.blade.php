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
                                    <th>Loacation</th>
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
                                    <td><a href="{{ url('/properties/'.$p->id) }}">{{ $p->name}}</a></td>
                                    <td>@if($p->property_for == 1) Buy @elseif($p->property_for == 2) Sale @else Off Plan @endif</td>
                                    <td>AED {{ $p->property_price }}</td>
                                    <td>@if(!empty($p->city)) @foreach(\App\City::where('id', $p->city)->get() as $cname) {{ $cname->name }} @endforeach @endif</td>
                                    <td>
                                        <div id="donate">
                                            <a href="{{ url('/admin/property/'.$p->id.'/edit') }}" title="Edit" class="label label-success label-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/admin/property/'.$p->id.'/delete') }}" title="Delete" class="label label-danger label-sm"><i class="fa fa-trash"></i></a>
                                        </div>
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