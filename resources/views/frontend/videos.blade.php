@extends('frontend.layout.main')
@section('content')
<section>
  <div class="page-category page-video">
    <div class="breadcrumb__block">
      <div class="main-container">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Video Dự An Đã Thực Hiện</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="main-container">
      <h2 class="page-category__title">Video dự án đã thực hiện</h2>
      <div class="product__block product__block--normal">
        <div class="product__block--list row">
            @foreach ($videoalls as $video)
            <div class="product__block--item col-6 col-sm-4 col-md-3">
                <iframe class="made__block--video" id="framevideo" width="100%" src="https://www.youtube.com/embed/<?php
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->link, $matches);
                echo $matches[1];
                ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                <a href="{{ $video->link }}"><h3 class="made__block--name">{{ $video->title }}</h3></a>
            </div>
            @endforeach

            <div class="box-trang">
                {{$videoalls->links('pagination::bootstrap-4')}}
            </div>
        </div>
      </div>
      <div class="product__block product__block--hot">
        <div class="product__block--title">
            <h2>Sản phẩm hot trong tháng</h2>
            <div class="product__block--line"></div>
            <div class="product__block--link">
                {{-- <a href="{ }}">Xem tất cả</a> --}}
        </div>
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
            @endforeach          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
    @include('frontend.include.voucher')
    @include('frontend.include.news')
    @include('frontend.include.service')
  </div>
</section>
@endsection
