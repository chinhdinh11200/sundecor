<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <title>AdminLTE 3 | Dashboard 2</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/public/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/public/backend/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="/public/backend/css/css.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<!-- Navbar -->
	@include('admin.layout.header')
<!-- /.navbar -->
<!-- Main Sidebar Container -->
  	@include('admin.layout.menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
   @yield('content') <!-- VI TRI MINH CAN THAY THE -->
<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- Main Footer -->
  	@include('admin.layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/public/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/public/backend/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/public/backend/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/public/backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/public/backend/plugins/raphael/raphael.min.js"></script>
<script src="/public/backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/public/backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="/public/backend/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="/public/backend/dist/js/pages/dashboard2.js"></script>
</body>
</html>
