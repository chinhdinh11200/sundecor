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
    <meta content="{{ $image ?? asset('upload/images/webinfo/' . $webInfo->image_web) }}" itemprop="thumbnailUrl" property="og:image">
    <meta content="{{ $description ?? $webInfo->description }}" itemprop="description" property="og:description">
    <meta name="twitter:card" value="summary">
    <meta name="twitter:url" content="{{ URL::current() }}">
    <meta name="twitter:title" content="{{ $title ?? $webInfo->title  }}">
    <meta name="twitter:description" content="{{ $description ?? $webInfo->description }}">
    <meta name="twitter:image" content="{{ $image ?? asset('upload/images/webinfo/' . $webInfo->image_web) }}">
    <meta name="twitter:site" content="@Sundecor">
    <meta name="twitter:creator" content="@Sundecor">
    <meta name="description" content="{{ $description ?? $webInfo->description }}">

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/png" href="{{ asset('upload/images/webinfo/' . $webInfo->logo) }}"/>

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
	<link rel="stylesheet" href="{{asset('frontend/style/thanks.css')}}">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>
<!-- <div id="fb-root"></div> -->
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="8eqkFuJn"></script> -->
<body id="welcome">
	<!-- <div id="fb-root"></div> -->
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1319787985150517&autoLogAppEvents=1" nonce="C00eKajK"></script>
	@include('frontend.layout.header')

	<div class="main-body">
		@yield('content')
	</div>
	@include('frontend.layout.footer')

    @include('sweetalert::alert')

	@yield('script')

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">ĐĂNG KÝ TƯ VẤN</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{ route('promotion.register') }}" method="POST">
				@csrf
				<input name="fullname" type="text" placeholder="Họ tên *" maxlength="30" require minlength="2">
				@if($errors->has('fullname'))
					<p style="color: red">{{ $errors->first('fullname') }}</p>
				@endif
				<input name="tel" type="text" placeholder="Số điện thoại *" require>
				@if($errors->has('tel'))
					<p style="color: red">{{ $errors->first('tel') }}</p>
				@endif
				<textarea name="description" rows="10" placeholder="Bạn cần tư vấn về điều gì?"></textarea>
				<button type="submit" class="btn btn-danger">ĐĂNG KÝ NGAY <i class="fas fa-paper-plane"></i></button>
			</form>
		</div>
		</div>
	</div>
	</div>

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
				<a href="{{ $webInfo->link_map }}">
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
	<div id="bottom-fixed__item--contact" data-bs-toggle="modal" data-bs-target="#exampleModal">
		GỬI LIÊN HỆ TỚI CHÚNG TÔI
	</div>
	<script>
		var myModal = document.getElementById('myModal')
		var myInput = document.getElementById('myInput')

		myModal.addEventListener('shown.bs.modal', function () {
		myInput.focus()
		})

		$("#to-top").click(function () {
			$("html, body").animate({scrollTop: 0}, 0);
		});
	</script>
</body>
</html>
