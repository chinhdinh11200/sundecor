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
                            @foreach ($menu_sale->products as $product)
                                <div class="swiper-slide">
                                    <div class="product__block--item col-12">
                                        <a href="{{ route('category', $product->slug) }}">
                                            <div class="card__product">
                                                @if (!$product->is_contact_product)
                                                    @if (!empty($product->product_size))
                                                        {{-- <div class="card__product--icon">
                                                            <p class="p">
                                                                {{floor(($product->product_size[0]->sell_price - $product->product_size[0]->sale_price) * 100/$product->product_size[0]->sell_price)}}%
                                                            </p>
                                                        </div> --}}
                                                    @endif
                                                @endif
                                                <div class="card__product--img"><img src="{{ asset('upload/images/product/'. $product->image_1) }}" alt="" /></div>
                                                <h3 class="card__product--name">{{ $product->name }}</h3>
                                                <div class="card__product--price d-flex justify-content-between align-items-center">
                                                    @if (!($product->is_contact_product))
                                                        @if (isset($product->product_size[0]))
                                                            <div class="card__product--promotional card__product--promotional-especially">{{ number_format($product->product_size[0]->sale_price) }}đ</div>
                                                            <div class="card__product--promotional card__product--promotional-especially card__product--promotional-absolute">{{ number_format($product->product_size[0]->sale_price) }}đ</div>
                                                            <span class="card__product--cost">{{ number_format($product->product_size[0]->sell_price) }}đ</span>
                                                        @endif
                                                    @else
                                                        <div class="card__product--contact">Giá liên hệ : </div>
                                                        <span class="card__product--phone">{{ $webInfo->hotline }}</span>
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
            @endforeach
            @foreach ($menus1 as $menu1)
            <div class="product__block product__block--normal">
                <div class="product__block--title">
                    <h2>{{ $menu1->name }}</h2>
                    <div class="product__block--line"></div>
                    <div class="product__block--link"><a href="{{ route('category', $menu1->slug) }}">Xem tất cả</a></div>
                </div>
                <div class="product__block--list row">
                    @foreach ($menu1->products as $product)
                        <div class="product__block--item col-6 col-sm-4 col-md-3">
                            <a href="{{ route('category', $product->slug) }}">
                                <div class="card__product">
                                    @if (!$product->is_contact_product)
                                        @if ($product->product_size()->first())
                                            <div class="card__product--icon">
                                                <p class="p">
                                                    {{floor(($product->product_size()->first()->sell_price - $product->product_size()->first()->sale_price) * 100/$product->product_size()->first()->sell_price).'%'}}
                                                </p>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="card__product--img"><img src="{{  asset('upload/images/product/' . $product->image_1) }}" alt="" /></div>
                                    <h3 class="card__product--name">{{ $product->name }}</h3>
                                    <div class="card__product--price d-flex justify-content-between align-items-center">
                                        @if (!($product->is_contact_product))
                                            @if ((!empty($product->product_size)))
                                                {{-- {{ (empty($product->product_size)) }} --}}
                                                <div class="card__product--promotional">{{ number_format($product->product_size[0]->sale_price) }}đ</div>
                                                <span class="card__product--cost">{{ number_format($product->product_size[0]->sell_price) }}đ</span>
                                            @endif
                                        @else
                                            <div class="card__product--contact">Giá liên hệ : </div>
                                            <span class="card__product--phone">{{ $webInfo->hotline }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
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

