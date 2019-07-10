@extends('layouts.backend.admin_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">List of Subscribers</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="allusers-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $i = 0 ?>
                                    @foreach(\App\Subscriber::orderBy('created_at', 'desc')->get() as $subs)
                                    <?php $i++ ?>
                                    <td><strong>{{ $i }}</strong></td>
                                    <td><strong>{{ $subs->name }}</strong></td>
                                    <td>{{ $subs->email}}</td>
                                    <td>{{ date('d M, Y', strtotime($subs->created_at)) }}</td>
                                    <td>
                                        <div id="donate">

                                            @if($subs->status == 1)
                                            <a title="Enable" class="label label-success label-sm">Enable</a>
                                            @else
                                            <a title="Disable" class="label label-danger label-sm">Disable</a>
                                            @endif
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

@endsection