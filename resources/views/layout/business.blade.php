<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  
    <title>tHRS | @yield('title')</title>
  
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--favicon-->
     <link rel="icon" href="{{ asset('assets/images/thrs.jpg') }}" type="image/png"/>
     <!--plugins-->
     <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
     <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
     <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
     <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
     <!-- loader-->
     <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet"/>
     <script src="{{ asset('assets/js/pace.min.js') }}"></script>
     <!-- Bootstrap CSS -->
     <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
     <!-- Theme Style CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}"/>
     <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}"/>
     <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}"/>
     <title>tHRS Admin | Home</title>
  </head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="page-wrapper">
  <!-- Navbar -->
  @include('business.inc.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('business.inc.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @include('business.inc.content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  {{-- @include('business.inc.footer') --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/chartjs/js/chart.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script>
    $(function() {
      $(".knob").knob();
    });
</script>
<script src="{{ asset('assets/js/index.js') }}"></script>
<!--app JS-->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
  new PerfectScrollbar(".app-container")
</script>
</html>
