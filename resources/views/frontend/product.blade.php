@extends('frontend.layout.main', ['keyword' => $product->keyword, 'title' => $product->title, 'description' => $product->description, 'image' => asset('upload/images/product/' . $image_main)])
@section('content')
    <section>
        <div class="product__detail">
            <div class="main-container product__container">
                <div class="row product__detail--row">
                    <div class="product__detail--left col-12 row">
                        <div class = "product__detail--img col-12">
                            <div class="swiper product__detail--swiper2" >
                                <div class="swiper-wrapper">
                                    @if($product->image_main)
                                        @for($i=1; $i<=3; $i++)
                                            @if($i==$product->image_main)
                                                <div class = "product__detail--image swiper-slide">
                                                    <img src = "{{asset('upload/images/product/'. $product['image_' . $i])}}" alt = "{{ $product->name }}" id = "productImg">
                                                </div>
                                            @endif
                                        @endfor
                                        @for($i=1; $i<=3; $i++)
                                            @if($product['image_' . $i])
                                                @if($i!=$product->image_main)
                                                    <div class = "product__detail--image swiper-slide">
                                                        <img src = "{{asset('upload/images/product/'. $product['image_' . $i])}}" alt = "{{ $product->name }}" id = "productImg">
                                                    </div>
                                                @endif;
                                            @endif;
                                        @endfor
                                    @endif
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper product__detail--swiper1">
                                <div class="product__img--select swiper-wrapper">
                                    @if($product->image_main)
                                        @for($i=1; $i<=3; $i++)
                                            @if ($i==$product->image_main)
                                                <div class = "swiper-slide product__select--image active">
                                                    <img class = "select_img"src = "{{asset('upload/images/product/'. $product['image_' . $i])}}" alt = "{{ $product->name }}">
                                                </div>
                                            @endif
                                        @endfor
                                        @for($i=1; $i<=3; $i++)
                                            @if ($i!=$product->image_main)
                                                @if ($product['image_' . $i])
                                                    <div class = "swiper-slide product__select--image active">
                                                        <img class = "select_img"src = "{{asset('upload/images/product/'. $product['image_' . $i])}}" alt = "{{ $product->name }}">
                                                    </div>
                                                @else
                                                    <div class = "swiper-slide product__select--image active">
                                                        <img class = "select_img"src = "{{asset('upload/images/product/'. $product['image_' . $product->image_main])}}" alt = "{{ $product->name }}">
                                                    </div>
                                                @endif
                                            @endif
                                        @endfor
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class = "product__detail--info col-12">
                            <div class = "product__detail--name">
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class = "product__detail--price row">
                                <div class="product__price--sale col-md-12">
                                    @if (!$product->is_contact_product)
                                        <div class="product__sale">
                                            <div class="product__sale--label">
                                                Giảm giá
                                            </div>
                                            <div class="product__sale--percent">
                                                {{ $product->product_size()->first() ? floor(($product->product_size()->first()->sell_price - $product->product_size()->first()->sale_price) * 100/$product->product_size()->first()->sell_price) : ''}} %
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if ($product->is_contact_product)
                                    <div>Giá liên hệ</div>
                                @else
                                    @foreach ($product_sizes as $key => $product_size)
                                        <div class="product__price--show product__price--show<?php echo $key+1 ?>">
                                            <div class="product__price--sale col-md-6">
                                                <p>{{ number_format($product_size->sale_price) }} đ</p>
                                            </div>
                                            <div class="product__price--sell col-md-6">
                                                <div class="product__sell--old">
                                                    Giá gốc : <span>{{ number_format($product_size->sell_price) }} đ</span>
                                                </div>
                                                <div class="product__sell--save">
                                                    Tiết Kiệm : {{ number_format($product_size->sell_price - $product_size->sale_price) }} đ
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class = "product__detail--order row">
                                <div class="product__order--label col-md-6">
                                    <span>{{ $webInfo->sale }}</span>
                                    {{-- <span>ĐẶT ONLINE GIẢM </span>
                                    <span style = "color : yellow"> <b>300,000</b></span> --}}
                                </div>
                                <div class="product__order--phone col-md-6">
                                    <form action="{{ route('gift.register') }}" method="POST">
                                        @csrf
                                        <input name = "tel" type = "text" maxlength = "10" id = "tel" class="product__phone--input" placeholder="Nhập số điện thoại" style="padding-left: 15px;width:97%;background-color: white;">
                                        <input name = "product_id" type = "hidden" value="{{ $product->id }}">
                                        <button class="product__phone--sent" type="submit">
                                            <b>GỬI</b>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @if ($errors->has('tel'))
                                <div class = "row">
                                    <div class="col-md-12">
                                        <p style="color: red; margin-top: 5px">{{ $errors->first('tel') }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="product__detail--ad">
                                <img src="{{asset('frontend\images\product_detail\icon-note.png')}}" alt="">
                                <ul class="product__detail--note">
                                    <li>{{ $webInfo->gift }}</li>
                                    {{-- <li>
                                    Miễn phí lắp đặt < 20 Km - Free vận chuyển Toàn Quốc
                                    </li>
                                    <li>
                                    ( Áp dụng hóa đơn > 3.000.000 vnđ )
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="product__detail--ossascomp row">
                                <div class="product__ossascomp--size col-12 col-md-6 d-flex">
                                        <p class="text-center" style="font-weight: 500;">Kích thước:</p>
                                        <div class="product__size--code">
                                            {{-- {{ dd($product_sizes) }} --}}
                                            @foreach ($product_sizes as $key => $product_size)
                                                <li class="product__code_a <?php if($key == 0) echo 'active'; ?>" target="<?= $key+1 ?>" onclick="selectPrice({{ $product_size->id }})">{{ $product_size->size ?? $product_size->size }}</li>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="product__ossascomp--other col-12 col-md-6">
                                    <li class="d-flex">Chất liệu: <span> {{ $product->material }}<span></li>
                                    <li>Màu sắc : {{ $product->color }}</li>
                                    <li>Tình trạng : {{' '. $product->sold_out }}</li>
                                    <li>Bảo hành : {{' '. $product->guarantee }} tháng</li>
                                </div>
                            </div>
                            <form action="{{ route('cart.create') }}" class="product__detail--book" method="POST" id="form_cart">
                                @csrf
                                <input type="hidden" name="session_id" id="session_id">
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                @if (isset($product_sizes[0]))
                                    <input type="hidden" name="product_size_id" id="product_id" value="{{ $product_sizes[0]->id }}">
                                @endif
                                <button type="submit" class="product__button product__button--red product__book--bought">
                                    <b id="buy">Mua ngay</b>
                                    <i class="fa fa-cart-arrow-down"></i>
                                </button>
                                <a class="product__button product__button--black product__book--contact" href = "#">
                                    <b >Tư vấn ngay </b>
                                    <i class="fas fa-phone-volume"></i>
                                </a>
                            </form>

                            <div class="product__detail--showroom">
                                <div class="product__showroom">
                                <span class=" product__showroom--title "style="color : black">KHÁCH HÀNG</span>
                                <span class=" product__showroom--sold" style="color : red">ĐÃ MUA</span>
                                </div>
                                <div class="product__showroom--location">
                                    @foreach ($customers as $customer)
                                        <div class="product__showroom--eachlocation">
                                            <i class="fas fa-check"></i>
                                            <li>{{ $customer->name }} - {{ $customer->phone_number }} <span>{{ $customer->address }}</span></li>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="product__detail--heading"><span>Chi tiết sản phẩm</span></div>
                        <div class="textmore__block">
                            <div class="textmore__block--content textmore__block--content2">
                                <span class="textmore__block--overlay"></span>
                                {!! $product->content !!}
                            </div>
                            <a class="textmore__block--button textmore__block--button2">Xem thêm</a>
                        </div>
                        <div class="product__detail--adviss" style="background-image: url({{ asset('upload/images/webinfo/' . $webInfo->banner_ad) }});">
                            <div class="adviss__frame">
                                <div class="adviss__frame--top">
                                    ĐĂNG KÝ TƯ VẤN<br>
                                    THÊM VỀ SẢN PHẨM NÀY<br>
                                    <span>Chỉ dành cho 100 khách hàng đăng ký nhanh nhất</span>
                                </div>
                                <form action="{{ route('promotion.register') }}" method="POST">
                                    @csrf
                                    <input name="fullname" type="text" placeholder="Họ tên *" maxlength="30" require minlength="2">
                                    @if($errors->has('fullname'))
                                        <p style="color: red">{{ $errors->first('fullname') }}</p>
                                    @endif
                                    <input name="tel" type="text" placeholder="Số điện thoại *" require>
                                    @if($errors->has('tel'))
                                        <p style="color: red">{{ $errors->first('tel') }}</p>
                                    @endif
                                    <textarea name="description" rows="10" placeholder="Bạn cần tư vấn về điều gì?"></textarea>
                                    <button type="submit" class="btn btn-danger">ĐĂNG KÝ NGAY <i class="fas fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product__detail--right col-12 row">
                        <div class = "product__detail--staff col-12">
                            <div class = "product__staff--list">
                                <div class="product__button product__button--black product__list--titlte d-flex justify-content-center align-items-center">
                                    <b>NHÂN VIÊN BÁN HÀNG</b>
                                </div>
                                <div class = "product__list--ad">
                                    @foreach ($supporters as $supporter)
                                        <div class="product__list--infor">
                                            <img src = "{{asset('upload/images/supporter/'. $supporter->image)}}" alt = "">
                                            <span>{{ $supporter->fullname }}</span>
                                            <strong>{{ $supporter->tel }}</strong>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Your embedded comments code -->
                <div class="fb-comments" data-href="https://chinh.fun/{{$product->slug}}" data-width="100%" data-numposts="5"></div>
                @include('frontend.include.video')
                {{-- @include('frontend.include.construct') --}}
            </div>
        </div>
        <script>

            // $(document).ready(function(){
            //     const form = document.getElementById('form_cart');

            //     var productSize_id = document.getElementById('product_size_id');
            //     if(productSize_id){
            //         productSize_id.remove();
            //     }

            //     productSize_id = document.createElement("input");
            //     productSize_id.setAttribute('name', 'product_size_id');
            //     productSize_id.setAttribute('id', 'product_size_id');
            //     productSize_id.setAttribute('type', 'hidden');
            //     productSize_id.setAttribute('value', );
            //     form.appendChild(productSize_id);
            // });
            function selectPrice(id) {
                const form = document.getElementById('form_cart');

                var productSize_id = document.getElementById('product_size_id');
                if(productSize_id){
                    productSize_id.remove();
                }

                productSize_id = document.createElement("input");
                productSize_id.setAttribute('name', 'product_size_id');
                productSize_id.setAttribute('id', 'product_size_id');
                productSize_id.setAttribute('type', 'hidden');
                productSize_id.setAttribute('value', id);
                form.appendChild(productSize_id);
            }

        </script>
        @include('frontend.include.voucher')
        @include('frontend.include.news')
        @include('frontend.include.service')
    </section>

@endsection
