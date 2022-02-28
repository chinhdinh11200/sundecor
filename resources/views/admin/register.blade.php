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
  <link rel="stylesheet" href="{{asset('/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/backend/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('/backend/css/css.css')}}">

  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>
<body class="vh-100">

<section style="text-align: center; height: 100%">
	<div class="page-login h-100">
    <div class="container container-main">
        <div class="frame-form">
            <?php if(isset($alert)){?>
                <section class="alert alert-danger"><?=$alert?></section>
            <?php }?>
            <div class="form-logo">
                <a href="">
                    <img src="{{ asset('upload/images/webinfo/' . $webInfo->logo) }}" alt="">
                </a>
            </div>
            <div class="container-form">
                <form class="frame-form-login" action="{{ route('admin.register') }}"  method="post">
                    @csrf
                    <div class="d-flex align-items-center mb-3">
                        <label class="form-label col-3"> Tên đăng nhập:</label>
                        <input class="form-input-text col-9" required="" type="text" name="username" />
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <label class="form-label col-3"> Email:</label>
                        <input class="form-input-text col-9" required="" type="text" name="email" />
                    </div>
                    <div class="d-flex align-items-center mb-5">
                        <label class="form-label col-3"> Mật khẩu:</label>
                        <input class="form-input-text col-9" required="" type="password" min="8" name="password" />
                    </div>
                    <input class="form-button-submit" value="ĐĂNG NHẬP" type="submit" name="dangnhap"/>
                </form>
            </div>
        </div>
    </div>
	</div>
</section>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/backend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('/backend/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('/backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('/backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('/backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('/backend/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<!-- <script src="{{asset('/backend/dist/js/pages/dashboard2.js')}}"></script> -->
</body>
</html>
