<!DOCTYPE html>
<html>
<head>
	<title>{{ $title ?? $webInfo->title  }}</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?=$keyword ?? $webInfo->keywords?>" />
    <meta name="revisit-after" content="1 days">
    <meta content="{{ $webInfo->site_name }}" property="og:site_name">
    <meta content="article" property="og:type">
    <meta content="{{ $title ?? $webInfo->title  }}" itemprop="headline" property="og:title">
    <meta content="{{ URL::current() }}" itemprop="url" property="og:url">
    <meta content="https://sundecor.vn/img/m/den-trang-tri-sundecor.jpg" itemprop="thumbnailUrl" property="og:image">
    <meta content="{{ $description ?? $webInfo->description }}" itemprop="description" property="og:description">
    <meta name="twitter:card" value="summary">
    <meta name="twitter:url" content="{{ URL::current() }}">
    <meta name="twitter:title" content="{{ $title ?? $webInfo->title  }}">
    <meta name="twitter:description" content="{{ $description ?? $webInfo->description }}">
    <meta name="twitter:image" content="https://sundecor.vn/img/m/den-trang-tri-sundecor.jpg">
    <meta name="twitter:site" content="@Sundecor">
    <meta name="twitter:creator" content="@Sundecor">
    <meta name="description" content="{{ $description ?? $webInfo->description }}">

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/png" href="{{asset('frontend/images/common/logo.png')}}"/>

	<link rel="stylesheet" type="text/css" href="{{asset('frontend/style/animate.css')}}">

	<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

	<link rel="stylesheet" href="{{asset('frontend/style/common.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/custom.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/footer.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/header.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/top.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/news_detail.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/product_detail.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/category.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style/video.css')}}">
</head>
<style type="text/css">
	@font-face {
		font-family: "Myriad Pro Bold";
		src: url('{{ public_path('frontend/fonts/Myriad_Pro_Bold.otf') }}');
	}
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="8eqkFuJn"></script>
<body id="welcome">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1319787985150517&autoLogAppEvents=1" nonce="C00eKajK"></script>
	@include('frontend.layout.header')

	@yield('content')

	@include('frontend.layout.footer')

    @include('sweetalert::alert')

	@yield('script')

	<div class="bottom-fixed" id="bottom-fixed__call">
		<div class="position-relative">
			<div class="bottom-fixed__item bottom-fixed__item--call">
				<a href="">
					<div class="to-top__img align-items-center d-flex">
						<img src="{{asset('/frontend/images/common/phone.png')}}" alt="">
						0942.83.77.99
					</div>
				</a>
			</div>
			<div class="bottom-fixed__item bottom-fixed__item--call" id="bottom-fixed__item--call-red">
				<a href="https://www.facebook.com/messages/t/790775891055345/">
					<div class="to-top__img align-items-center d-flex">
						<img src="{{asset('/frontend/images/common/phone.png')}}" alt="">
						0978.285.888
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="bottom-fixed">
		<div class="position-relative">
			<div class="bottom-fixed__item" id="bottom-fixed__item--map">
				<a href="">
					<div class="to-top__img justify-content-center align-items-center d-flex">
						<img src="{{asset('/frontend/images/common/icon-map.png')}}" alt="">
					</div>
				</a>
			</div>
			<div class="bottom-fixed__item" id="bottom-fixed__item--messen">
				<a href="https://www.facebook.com/messages/t/790775891055345/">
					<div class="to-top__img justify-content-center align-items-center d-flex">
						<img src="{{asset('/frontend/images/common/icon-messen.png')}}" alt="">
					</div>
				</a>
			</div>
			<div class="bottom-fixed__item" id="bottom-fixed__item--zalo">
				<a href="https://zalo.me/0978285888">
					<div class="to-top__img justify-content-center align-items-center d-flex">
						<img src="{{asset('/frontend/images/common/icon-zalo.png')}}" alt="">
					</div>
				</a>
			</div>
			<div class="bottom-fixed__item" id="to-top">
				<div class="to-top__img justify-content-center align-items-center d-flex"><img src="{{asset('/frontend/images/common/icon-totop.svg')}}" alt=""></div>
			</div>
		</div>
	</div>
	<div id="bottom-fixed__item--contact">
		GỬI LIÊN HỆ TỚI CHÚNG TÔI
	</div>
</body>
</html>
