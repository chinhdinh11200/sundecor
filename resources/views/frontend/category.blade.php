@extends('frontend.layout.main')
@section('content')
<section>

  <div class="page-category">
    <div class="breadcrumb__block">
      <div class="main-container">
        <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            @if ($menu->parent_menu_id==0)
                <li class="breadcrumb-item active" aria-current="page">{{$menu->name}}</li>
            @else
                <li class="breadcrumb-item">
                @foreach ($main_menu1 as $menu1)
                    @if ($menu1->id == $menu->parent_menu_id)
                        <a href="{{ route('category', $menu1->slug) }}">{{ $menu1->name }}</a>
                    @endif
                @endforeach
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$menu->name}}</li>
            @endif
            </ol>
        </nav>
      </div>
    </div>
    <div class="main-container">
        <div class="category__frame">
            <h4 class="category__frame--title">
                @if ($menu->parent_menu_id)
                    @foreach ($main_menu1 as $menu1)
                        @if ($menu1->id == $menu->parent_menu_id)
                            {{ $menu1->name }}
                        @endif
                    @endforeach
                @else
                    {{ $menu->name }}
                @endif
            </h4>
            <ul class="category__frame--list row">

                @if ($menu->parent_menu_id)
                    @foreach ($menu2 as $mn2)
                        @if ($mn2->parent_menu_id == $menu->parent_menu_id)
                        <li class="category__frame--item col-6 col-sm-4 col-md-3" <?php ?>>
                            <a href="{{ route('category', $mn2->slug) }}" class="category__frame--link <?php echo ($mn2->id == $menu->id ? 'category__frame--active' : '') ?>">{{ $mn2->name }}</a>
                        </li>
                        @endif
                    @endforeach
                @else
                    @foreach ($menu2 as $mn2)
                        @if ($mn2->parent_menu_id == $menu->id)
                        <li class="category__frame--item col-6 col-sm-4 col-md-3">
                        <a href="{{ route('category', $mn2->slug) }}" class="category__frame--link <?php echo ($mn2->id == $menu->id ? 'category__frame--active' : '') ?>">{{ $mn2->name }}</a>
                        </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
      <h2 class="page-category__title">{{ $menu->title }}</h2>
      <div class="textmore__block">
        <div class="textmore__block--content textmore__block--content1">
          <span class="textmore__block--overlay"></span>
          <p>{!! $menu->content_1 !!}</p>

        </div>
        <a class="textmore__block--button textmore__block--button1">Xem thêm</a>
      </div>
      <div class="product__block product__block--sale">
        <div class="product__block--title">
            <h2>Sản phẩm {{ $menu->name }} bán chạy</h2>
            <div class="product__block--line"></div>
            <div class="product__block--link"><a href="">Xem tất cả</a></div>
        </div>
            <div class="swiper productSwiper">
                <div class="swiper-wrapper">
                    @foreach ($product_menu_hots as $product_hot)
                        <div class="swiper-slide">
                        <div class="product__block--item col-12">
                        <a href="{{ route('category', $product_hot->slug) }}">
                            <div class="card__product">
                            <div class="card__product--img"><img
                                src="{{ asset('upload/images/product/'. $product_hot->image_1) }}" alt="" /></div>
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
      <div class="product__block product__block--normal">
        <div class="product__block--title">
          <h2>{{ $menu->name }}</h2>
          <div class="product__block--line"></div>
          <div class="product__block--link"><a href="">Xem tất cả</a></div>
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
                            @if (!($product->product_size()->get()->isEmpty()) && $product->product_size()->get()[0]->sell_price)
                                <div class="card__product--promotional">{{ number_format($product->product_size()->get()[0]->sale_price) }}đ</div>
                                <span class="card__product--cost">{{ number_format($product->product_size()->get()[0]->sell_price) }}đ</span>
                            @else
                                <div class="card__product--promotional">Giá liên hệ : </div>
                                <span>0987654321</span>
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
      <div class="product__block product__block--hot">
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
            @endforeach          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
        <div class="textmore__block">
          <div class="textmore__block--content textmore__block--content2">
            <span class="textmore__block--overlay"></span>
            <p>{!! $menu->content_2 !!}</p>

          </div>
          <a class="textmore__block--button textmore__block--button2">Xem thêm</a>
        </div>
    </div>
    @include('frontend.include.voucher')
    @include('frontend.include.news')
    @include('frontend.include.service')
  </div>
</section>
@endsection
