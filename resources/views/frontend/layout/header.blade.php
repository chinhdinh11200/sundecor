<header id="header">
	<div class="header__top">
		<div class="main-container">
			<ul class="header__top--list">
				<li class="header__top--item"><a class="header__top--link" href="#">Gi&#x1EDB;i thi&#x1EC7;u</a></li>
				<li class="header__top--item"><a class="header__top--link" href="#">H&#x1B0;&#x1EDB;ng d&#x1EAB;n mua h&agrave;ng</a></li>
				<li class="header__top--item"><a class="header__top--link" href="#">Link</a></li>
				<li class="header__top--item"><a class="header__top--link" href="#">S&#x1A1; &dstrok;&#x1ED3; ch&#x1EC9; &dstrok;&#x1B0;&#x1EDD;ng</a></li>
				<li class="header__top--item"><a class="header__top--link" href="tel:+84978285888"><b>HOTLINE: 0978.285.888</b></a></li>
			</ul>
		</div>
	</div>
	<div class="header__center">
		<div class="main-container">
			<div class="header__center--search">
				<p class="icon-open__sp">
					<img src="{{asset('/frontend/images/common/icon-open.png')}}" alt="" class="">
				</p>
				<form class="header__center--form" action="">
				@csrf
				<input class="header__center--input" type="text" placeholder="Nhập từ khóa tìm kiếm "><button class="header__center--button" type="submit"><img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png"></button></form>
			</div>
			<div class="header__center--logo"><img src="{{asset('/frontend/images/common/logo.png')}}" alt=""></div>
			<div class="header__center--option">
				<div class="header__center--contact">
					<img src="{{asset('/frontend/images/common/icon-call.gif')}}" alt="">
					<div>GỌI MUA HÀNG:<b>&ensp;0965.69.8866</b></div>
				</div>
				<form action="{{ route('cart.index') }}" method="GET">
					{{-- @csrf --}}
					<input type="hidden" name="session_id">
					<button  style="border: none!important; background: transparent!important;" type="submit">
						<div class="header__center--cart"><span id="cartQuantity">0</span></div>                    </button>
				</form>
			</div>
		</div>
		<div class="container-menu__sp">
			<div class="icon-close__sp">
					<img src="{{asset('/frontend/images/common/icon-close.png')}}" alt="">
			</div>
			<div class="nav-menu__sp">
					<a href="/">HOME</a>
					<a href="/faq">よくある質問</a>
			</div>
		</div>
	</div>
	<div class="header__menu">
		<div class="main-container">
			<ul class="header__menu--list">
				<li class="header__menu--item header__menu-active"><a class="header__menu--link" href="/">Trang ch&#x1EE7;</a></li>
				<?php foreach($main_menu1 as $main_mn1): ?>
					<li class="header__menu--item"><a class="header__menu--link" href="{{ route('category', $main_mn1->slug) }}">{{$main_mn1->name}}</a>
						<ul class="header__submenu--list">
							<div class="main-container">
								<div class="row">
									<?php foreach($menu2 as $mn2): ?>
										<?php if($mn2->parent_menu_id == $main_mn1->id): ?>
											<li class="header__submenu--item col-md-2-4"><a class="header__submenu--link" href="{{ route('category', $mn2->slug) }}">{{$mn2->name}}</a>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
	</div>
</header>
	<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
