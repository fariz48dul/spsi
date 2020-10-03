<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset ('assets/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset ('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ('assets/css/adminlte.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset ('assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{asset ('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

    <!-- overlayScrollbars -->
    <script src="{{asset ('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{asset ('assets/js/adminlte.js')}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset ('assets/js/demo.js')}}"></script>

    @stack('page-script')

    <!-- PAGE PLUGINS -->

    <!-- jQuery Mapael -->
    <script src="{{asset ('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset ('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset ('assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>

    <!-- ChartJS -->

    <!-- After Script -->

</body>

</html>
