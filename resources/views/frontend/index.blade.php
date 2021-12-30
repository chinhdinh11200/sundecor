@extends('frontend.layout.main')
@section('content')
    <div class="page-top">
        <div class="banner__block">
            <div class="swiper bannerSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="https://sundecor.vn/img/g/g105.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="https://sundecor.vn/img/g/g92.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="https://sundecor.vn/img/g/g91.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="https://sundecor.vn/img/g/g93.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="	https://sundecor.vn/img/g/g94.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="	https://sundecor.vn/img/g/g95.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="	https://sundecor.vn/img/g/g96.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="https://sundecor.vn/img/g/g97.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="	https://sundecor.vn/img/g/g106.jpg" alt="" /></a></div>
                <div class="swiper-slide">
                    <a class="banner__block--link" href="">
                    <img src="https://sundecor.vn/img/g/g107.jpg" alt="" /></a></div>
            </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="main-container">
            <div class="product__block product__block--sale">
                <div class="product__block--title">
                    <h2>Sản phẩm khuyến mại</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="swiper productSwiper">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < 10; ++$i) { ?>
                            <div class="swiper-slide">
                                <div class="product__block--item col-12">
                                    <a href="#">
                                        <div class="card__product">
                                            <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                            <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                            <div class="card__product--price d-flex justify-content-between align-items-center">
                                                <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                            </div>
                                        </div>
                                </a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="product__block product__block--hot">
                <div class="product__block--title">
                    <h2>Sản phẩm hot trong tháng</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="swiper productSwiper">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < 10; ++$i) { ?>
                            <div class="swiper-slide">
                                <div class="product__block--item col-12"><a href="#">
                                        <div class="card__product">
                                            <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                            <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                            <div class="card__product--price d-flex justify-content-between align-items-center">
                                                <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            @foreach ($menus1 as $menu1)

            <div class="product__block product__block--chum">
                <div class="product__block--title">
                    <h2>{{ $menu1->name }}</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    @foreach ($products as $product)
                        @if ($menu1->id == $product->parent_id)
                            <div class="product__block--item col-6 col-sm-4 col-md-3">
                                <a href="#">
                                    <div class="card__product">
                                        <div class="card-product--img"><img src="{{  asset('upload/images/product/' . $product->image_1) }}" alt="" /></div>
                                        <h3 class="card__product--name">{{ $product->name }}</h3>
                                        <div class="card__product--price d-flex justify-content-between align-items-center">
                                            <div class="card__product--promotional">{{ $product->sale_price }} đ</div><span class="card__product--cost">{{ $product->sell_price }} đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @endforeach

            {{-- <div class="product__block product__block--chum">
                <div class="product__block--title">
                    <h2>Đèn chùm</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="#">
                                <div class="card__product">
                                    <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                    <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>

            <div class="product__block product__block--mam">
                <div class="product__block--title">
                    <h2>Đèn mâm</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="#">
                                <div class="card__product">
                                    <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                    <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="product__block product__block--tha">
                <div class="product__block--title">
                    <h2>Đèn thả</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="#">
                                <div class="card__product">
                                    <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                    <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="product__block product__block--tang">
                <div class="product__block--title">
                    <h2>Đèn thông tầng</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="#">
                                <div class="card__product">
                                    <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                    <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="product__block product__block--quat">
                <div class="product__block--title">
                    <h2>Quạt trần đèn</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                <?php for ($i = 0; $i < 8; ++$i) { ?>
                    <div class="product__block--item col-6 col-sm-4 col-md-3">
                        <a href="#">
                            <div class="card__product">
                                <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                <div class="card__product--price d-flex justify-content-between align-items-center">
                                    <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                </div>
                            </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="product__block product__block--ban">
                <div class="product__block--title">
                    <h2>Đèn bàn - sàn</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="#">
                                <div class="card__product">
                                    <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                    <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="product__block product__block--tuong">
                <div class="product__block--title">
                    <h2>đèn tường</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="#">
                                <div class="card__product">
                                    <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                    <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="product__block product__block--led">
                <div class="product__block--title">
                    <h2>Đèn led</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="product__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="#">
                                <div class="card__product">
                                    <div class="card-product--img"><img src="https://sundecor.vn/img/p/den-chum-dong-phong-khach-sp005685-3603.jpg" alt="" /></div>
                                    <h3 class="card__product--name">Đèn Chùm Pha Lê Màu Trắng GP 00001</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        <div class="card__product--promotional">60,000,000 đ</div><span class="card__product--cost">120,000,000 đ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div> --}}
            @include('frontend.include.video')
            @include('frontend.include.construct')
        </div>
        @include('frontend.include.voucher')
        @include('frontend.include.news')
        @include('frontend.include.service')
    </div>

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
@endsection
