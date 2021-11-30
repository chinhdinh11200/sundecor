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
				<form class="header__center--form" action="">
				@csrf
				<input class="header__center--input" type="text" placeholder="Nhập từ khóa tìm kiếm "><button class="header__center--button" type="submit"><img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png"></button></form>
			</div>
			<div class="header__center--logo"><img src="{{asset('/frontend/images/common/logo.png')}}" alt=""></div>
			<div class="header__center--option">
				<div class="header__center--contact">G&#x1ECC;I MUA H&Agrave;NG:<b>&ensp;0965.69.8866</b></div><a href="#">
					<div class="header__center--cart"></div>
				</a>
			</div>
		</div>
	</div>
	<div class="header__menu">
		<div class="main-container">
			<ul class="header__menu--list">
				<li class="header__menu--item header__menu-active"><a class="header__menu--link" href="#">Trang ch&#x1EE7;</a></li>
				<?php foreach($main_menu1 as $main_mn1): ?>
					<li class="header__menu--item"><a class="header__menu--link" href="#">{{$main_mn1->name}}</a>
						<ul class="header__submenu--list">
							<div class="main-container">
								<div class="row">
									<?php foreach($menu2 as $mn2): ?>
										<?php if($mn2->parent_menu_id ==  $main_mn1->id): ?>
											<li class="header__submenu--item col-md-2-4"><a class="header__submenu--link" href="#">{{$mn2->name}}</a>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="bottom-fixed">
		<div class="position-relative">
			<div class="bottom-fixed__item" id="to-top">
				<div class="to-top__img justify-content-center align-items-center d-flex"><img src="/assets/image/common/icon-totop.svg" alt=""></div>
			</div>
		</div>
	</div>
</header>