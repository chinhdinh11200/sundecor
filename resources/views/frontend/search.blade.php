@extends('frontend.layout.main')
@section('content')
<?php
    $mang = []
    // @foreach ($main_menu1 as $menu1)
    //     @if ($menu1->id == $menu->parent_menu_id)
    //         {{ $menu1->name }}
    //     @endif
    // @endforeach
?>
<section>
  <div class="page-category">
    <div class="breadcrumb__block">
      <div class="main-container">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tìm Kiếm</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="main-container">
      <!-- <h2 class="page-category__title">anb</h2> -->
      <div class="product__block product__block--normal">
        <div class="product__block--title">
          <h2 class="mt-5 mb-3">Kết quả tìm kiếm:&ensp;<span style="font-weight: 500; text-transform: none;"></span></h2>
        </div>
        <div class="product__block--list row">
            @foreach ($products as $product)
                <div class="product__block--item col-6 col-sm-4 col-md-3">
                    <a href="{{ route('category', $product->slug) }}">
                    <div class="card__product">
                        <div class="card__product--img"><img
                            src="{{ asset('upload/images/product/'. $product->image_1) }}" alt="" /></div>
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
            @endforeach

            <div class="box-trang">
                {{$products->links('pagination::bootstrap-4')}}
            </div>
        </div>
      </div>
    </div>
    @include('frontend.include.voucher')
    @include('frontend.include.news')
    @include('frontend.include.service')
  </div>
</section>
@endsection
