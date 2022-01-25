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
            <div class="product__block product__block--swiper">
                <div class="product__block--title">
                    <h2>Sản phẩm khuyến mại</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="swiper productSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($product_result_sale as $product_sale)
                            <div class="swiper-slide">
                                <div class="product__block--item col-12">
                                    <a href="{{ route('category', $product_sale->slug) }}">
                                        <div class="card__product">
                                            <div class="card__product--img"><img src="{{ asset('upload/images/product/'. $product_sale->image_1) }}" alt="" /></div>
                                            <h3 class="card__product--name">{{ $product_sale->name }}</h3>
                                            <div class="card__product--price d-flex justify-content-between align-items-center">
                                                <div class="card__product--promotional">{{ number_format($product_sale->sale_price) }} đ</div><span class="card__product--cost">{{  number_format($product_sale->sell_price) }} đ</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="product__block product__block--swiper">
                <div class="product__block--title">
                    <h2>Sản phẩm hot trong tháng</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="">Xem tất cả</a></div>
                </div>
                <div class="swiper productSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($product_hots as $product_hot)
                            <div class="swiper-slide">
                                <div class="product__block--item col-12">
                                    <a href="{{ route('category', $product_hot->slug) }}">
                                        <div class="card__product">
                                            <div class="card__product--img"><img src="{{ asset('upload/images/product/'. $product_hot->image_1) }}" alt="" /></div>
                                            <h3 class="card__product--name">{{ $product_hot->name }}</h3>
                                            <div class="card__product--price d-flex justify-content-between align-items-center">
                                                @if (!($product_hot->product_size()->get()->isEmpty()))
                                                    <div class="card__product--promotional">{{ number_format($product_hot->product_size()->get()[0]->sale_price) }}đ</div>
                                                    <span class="card__product--cost">{{ number_format($product_hot->product_size()->get()[0]->sell_price) }}đ</span>
                                                @else
                                                    <div class="card__product--promotional">Giá liên hệ : </div>
                                                    <span>0987654321</span>
                                                @endif
                                            </div>
                                        </div>
                                </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            @foreach ($menus1 as $menu1)
            <div class="product__block product__block--chum product__block--normal">
                    <div class="product__block--title">
                        <h2>{{ $menu1->name }}</h2>
                        <div class="product__block--line"></div>
                        <div class="product__block--link"><a href="{{ route('category', $menu1->slug) }}">Xem tất cả</a></div>
                    </div>
                    <div class="product__block--list">
                        @foreach ($products as $product)
                            @if ($menu1->id == $product->parent_id)
                                <div class="product__block--item col-6 col-sm-4 col-md-3">
                                    <a href="{{ route('category', $product->slug) }}">
                                        <div class="card__product">
                                            <div class="card__product--img"><img src="{{  asset('upload/images/product/' . $product->image_1) }}" alt="" /></div>
                                            <h3 class="card__product--name">{{ $product->name }}</h3>
                                            <div class="card__product--price d-flex justify-content-between align-items-center">
                                                <div class="card__product--promotional">{{ number_format($product->sale_price) }} đ</div><span class="card__product--cost">{{ number_format($product->sell_price) }} đ</span>
                                            </div>                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach

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
