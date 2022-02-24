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
            @foreach ($menu_sales as $menu_sale)
                <div class="product__block product__block--swiper">
                    <div class="product__block--title">
                        <h2>{{ $menu_sale->name }}</h2>
                        <div class="product__block--line"></div>
                        <div class="product__block--link"><a href="{{ $menu_sale->slug }}">Xem tất cả</a></div>
                    </div>
                    <div class="swiper productSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($product_hots as $product_sale)
                                @if ($product_sale->menu_id == $menu_sale->id)
                                    <div class="swiper-slide">
                                        <div class="product__block--item col-12">
                                            <a href="{{ route('category', $product_sale->slug) }}">
                                                <div class="card__product">
                                                    <div class="card__product--img"><img src="{{ asset('upload/images/product/'. $product_sale->image_1) }}" alt="" /></div>
                                                    <h3 class="card__product--name">{{ $product_sale->name }}</h3>
                                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                                        @if (!($product_sale->is_contact_product))
                                                            @if (($product_sale->product_size()->first()))
                                                                <div class="card__product--promotional">{{ number_format($product_sale->product_size()->first()->sale_price) }}đ</div>
                                                                <span class="card__product--cost">{{ number_format($product_sale->product_size()->first()->sell_price) }}đ</span>
                                                            @endif
                                                        @else
                                                            <div class="card__product--promotional">Giá liên hệ : </div>
                                                            <span>{{ $webInfo->hotline }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                {{-- <div class="product__block product__block--swiper">
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
                                                    @if (!($product_hot->is_contact_product))
                                                        @if (!($product_hot->product_size()->get()->isEmpty()))
                                                            <div class="card__product--promotional">{{ number_format($product_hot->product_size()->get()[0]->sale_price) }}đ</div>
                                                            <span class="card__product--cost">{{ number_format($product_hot->product_size()->get()[0]->sell_price) }}đ</span>
                                                        @endif
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
                </div> --}}
            @endforeach
            @foreach ($main_menu1 as $menu1)
            <div class="product__block product__block--normal">
                <div class="product__block--title">
                    <h2>{{ $menu1->name }}</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="{{ route('category', $menu1->slug) }}">Xem tất cả</a></div>
                </div>
                <div class="product__block--list row">
                    @foreach ($products as $product)
                        @if ($menu1->id == $product->parent_id)
                            <div class="product__block--item col-6 col-sm-4 col-md-3">
                                <a href="{{ route('category', $product->slug) }}">
                                    <div class="card__product">
                                        <div class="card__product--img"><img src="{{  asset('upload/images/product/' . $product->image_1) }}" alt="" /></div>
                                        <h3 class="card__product--name">{{ $product->name }}</h3>
                                        <div class="card__product--price d-flex justify-content-between align-items-center">
                                            @if (!($product->is_contact_product))
                                                @if (($product->product_size()->first()))
                                                    <div class="card__product--promotional">{{ number_format($product->product_size()->first()->sale_price) }}đ</div>
                                                    <span class="card__product--cost">{{ number_format($product->product_size()->first()->sell_price) }}đ</span>
                                                @endif
                                            @else
                                                <div class="card__product--promotional">Giá liên hệ : </div>
                                                <span>{{ $webInfo->hotline }}</span>
                                            @endif
                                        </div>
                                    </div>
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
