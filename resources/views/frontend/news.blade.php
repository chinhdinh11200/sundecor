@extends('frontend.layout.main', ['keyword' => $menu->keyword, 'title' => $menu->title, 'description' => $menu->description, 'image' => asset('upload/images/menu/' . $menu->images)])
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
      <h2 class="page-category__title">{{ $menu->name }}</h2>
        @if ($menu->content_1)
            <div class="textmore__block">
                <div class="textmore__block--content textmore__block--content1">
                <span class="textmore__block--overlay"></span>
                <p>{!! $menu->content_1 !!}</p>

                </div>
                <a class="textmore__block--button textmore__block--button1">Xem thêm</a>
            </div>
        @endif
      <div class="product__block product__block--normal">
        <div class="product__block--list row">
            @foreach ($news as $new)
            <div class="product__block--item col-6 col-sm-4 col-md-3">
                <a href="{{ route('category', $new->slug) }}">
                  <div class="card__product">
                    <div class="card__product--img"><img
                        src="{{ asset('upload/images/news/'. $new->image) }}" alt="" /></div>
                    <h3 class="card__product--name">{{ $new->name }}</h3>
                        {{-- thêm mô tả của tin tức --}}
                    <p>{{ $new->description }}</p>
                  </div>
                </a>
              </div>
            @endforeach

            <div class="box-trang">
                {{$news->links('pagination::bootstrap-4')}}
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
            @foreach ($product_hot2s as $product_hot)
                <div class="swiper-slide">
                    <div class="product__block--item col-12">
                        <a href="{{ route('category', $product_hot->slug) }}">
                            <div class="card__product">
                                <div class="card__product--img"><img src="{{ asset('upload/images/product/'. $product_hot->image_1) }}" alt="" /></div>
                                <h3 class="card__product--name">{{ $product_hot->name }}</h3>
                                <div class="card__product--price d-flex justify-content-between align-items-center">
                                    @if (!($product_hot->is_contact_product))
                                        @if ($price = \App\Models\ProductSize::find($product_hot->id))
                                            <div class="card__product--promotional">{{ number_format($price->sale_price) }}đ</div>
                                            <span class="card__product--cost">{{ number_format($price->sell_price) }}đ</span>
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
