<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/png" href="{{asset('frontend/images/logo-con.png')}}"/>
	
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/login/font-awesome.css')}}">
	
	<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	
	<link rel="stylesheet" href="{{asset('frontend/fonts/font-roboto.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/common.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/custom.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/footer.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/header.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/top.css')}}">
</head>
<body id="welcome">
	@include('frontend.layout.header')

	@yield('content')

	@include('frontend.layout.footer')

	@yield('script')
</body>
</html>