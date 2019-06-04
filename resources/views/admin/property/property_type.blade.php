@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3><a href="{{ url('admin/add-property-type') }}" class="label label-lg label-success">Add New</a></h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Property Types</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">List of Property Types</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Type Code</th>
                                    <th>URL</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $i = 0 ?>
                                    @foreach($property_type as $pt)
                                    <?php $i++ ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $pt->name }}</td>
                                    <td>{{ $pt->type_code}}</td>
                                    <td>{{ $pt->url }}</td>
                                    <td>{{ date('d M, Y', strtotime($pt->created_at)) }}</td>
                                    <td>
                                        <div id="donate">
                                            
                                            @if($pt->status == 1)
                                            <a href="/admin/ptdisable/{{ $pt->id }}" title="Disable"
                                                class="label label-success label-sm">Enable</a>
                                            @else
                                            <a href="/admin/ptenable/{{ $pt->id }}" title="Enable"
                                                class="label label-danger label-sm">Disable</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Type Code</th>
                                    <th>URL</th>
                                    <th>Date</th>
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