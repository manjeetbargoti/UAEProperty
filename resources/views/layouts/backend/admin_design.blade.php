<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'IPC Property Portal') }}</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset(config('app.favicon')) }}" type="image/x-icon"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-purple sidebar-mini fixed">

  <div class="wrapper">

    <div class='notifications top-right'></div>

    @include('layouts.backend.admin_header')

    @include('layouts.backend.admin_sidebar')

    @yield('content')

    @include('layouts.backend.admin_footer')

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- DataTables -->
  <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
  <!-- jvectormap  -->
  <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
  <!-- InputMask -->
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
  <!-- date-range-picker -->
  <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <!-- bootstrap datepicker -->
  <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- bootstrap color picker -->
  <script src="{{ asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <!-- bootstrap time picker -->
  <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>

  <!-- CK Editor -->
  <!-- <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script> -->
  <!-- <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> -->
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

  <!-- Custom js for Admin -->
  <script src="{{ asset('dist/js/custom.js') }}"></script>

  <!-- Check Current Password -->
  <script>
    $('#new_pwd').click(function() {
      var current_pwd = $('#current_pwd').val();
      // alert(current_pwd);
      $.ajax({
        type: 'get',
        url: '/admin/check-pwd',
        data: {
          current_pwd: current_pwd
        },
        success: function(resp) {
          if (resp == "false") {
            $('#chkPwd').html('<font color=red>Current Password is Incorrect!</font>');
          } else {
            $('#chkPwd').html('<font color=green>Current Password is Correct!</font>');
          }
        },
        error: function() {
          alert("error");
        }
      });
    });
  </script>

  <script>
    @if(Session::has('flash_message_success'))
    $('.top-right').notify({
      message: {
        text: "{{ Session::get('flash_message_success') }}"
      },
      // fadeOut: { enabled: true, delay: 3000 }
      transition: 'fade'
    }).show();
    @php
    Session::forget('flash_message_success');
    @endphp
    @endif

    @if(Session::has('flash_message_error'))
    $('.top-right').notify({
      message: {
        text: "{{ Session::get('flash_message_error') }}"
      },
      // fadeOut: { enabled: true, delay: 3000 },
      type: 'error',
      transition: 'fade'
    }).show();
    @php
    Session::forget('flash_message_error');
    @endphp
    @endif
  </script>

</body>

</html>