@extends('frontend.layout.main')
@section('content')
    <section>
        <div class="product__detail">
            <div class="main-container product__container">
                <div class="row product__detail--row">
                    <div class = "product__detail--img col-12">
                        <div class="swiper product__detail--swiper2" >
                            <div class="swiper-wrapper">    
                                <div class = "product__detail--image swiper-slide">
                                    <img src = "{{asset('frontend\images\common\img-leddetail.jpg')}}" alt = "Đèn chùm Hera" id = "productImg">
                                </div>
                                <div class = "product__detail--image swiper-slide">
                                    <img src = "{{asset('frontend\images\common\img-bank.png')}}" alt = "Đèn chùm Hera" id = "productImg">
                                </div>
                                <div class = "product__detail--image swiper-slide">
                                    <img src = "{{asset('frontend\images\common\logo.png')}}" alt = "Đèn chùm Hera" id = "productImg">
                                </div>
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper product__detail--swiper1">
                            <div class="product__img--select swiper-wrapper">
                                <div class = "swiper-slide product__select--image active">
                                    <img class = "select_img"src = "{{asset('frontend\images\common\img-leddetail.jpg')}}" alt = "Đèn chùm Hera">
                                </div>
                                <div class = "swiper-slide product__select--image ">
                                    <img class = "select_img" src = "{{asset('frontend\images\common\img-bank.png')}}" alt = "Đèn chùm Hera">
                                </div>
                                <div class = "swiper-slide product__select--image ">
                                    <img class = "select_img" src = "{{asset('frontend\images\common\logo.png')}}" alt = "Đèn chùm Hera">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "product__detail--info col-12">
                        <div class = "product__detail--name">
                            <p>Đèn chùm ITALY - GP00001</p>
                        </div>
                        <div class = "product__detail--price row">
                            <div class="product__price--sale col-md-6">
                                <div class="product__sale">
                                    <div class="product__sale--label">
                                        Giảm giá
                                    </div>
                                    <div class="product__sale--percent">
                                        50%
                                    </div>
                                </div>
                                <p>60,000,000 đ</p>
                            </div>
                            <div class="product__price--sell col-md-6">
                                <div class="product__sell--old">
                                    Giá gốc : 120,000,000 đ 
                                </div>
                                <div class="product__sell--save">
                                    Tiết Kiệm : 60,000,000 đ
                                </div>
                            </div>
                        </div>
                        <div class = "product__detail--order row">
                            <div class="product__order--label col-md-6">
                                <span>ĐẶT ONLINE GIẢM </span>
                                <span style = "color : yellow">  300,000</span>
                            </div>
                            <div class="product__order--phone col-md-6">
                                <form>
                                    @csrf
                                    <input name = "Tel" type = "text" maxlength = "30" id = "Tel" class="product__phone--input" placeholder="Nhập số điện thoại" style="padding-left: 15px;width:97%;background-color: white;">
                                            <div class="product__phone--sent">
                                                <b>GỬI</b>
                                            </div>
                                </form>
                            </div>
                        </div>
                        <div class="product__detail--ad">
                        <!-- <i class="fas fa-wallet col-15 col-md-1"></i> -->
                        <!-- <i class="fas fa-sack-dollar col-15 col-md-1">Dolla</i> -->
                            <ul>
                                <li>
                                Miễn phí lắp đặt < 20 Km - Free vận chuyển Toàn Quốc 
                                </li>
                                <li>
                                ( Áp dụng hóa đơn > 3.000.000 vnđ )
                                </li>
                            </ul>
                        </div>
                        <div class="product__detail--ossascomp row">
                            <div class="product__ossascomp--size col-12 col-md-6 d-flex">
                                <p class="text-center" style="font-weight: 500;">Kích thước:</p>
                                <div class="product__size--code">
                                    <li class="product__code_a active" onclick="">D600*H600mm</li>
                                    <li class="product__code_a" onclick="">D800*H800mm</li>
                                    <li class="product__code_a" onclick="">D1200*H1200mm</li>
                                </div>
                            </div>
                            <div class="product__ossascomp--other col-12 col-md-6">
                                <li class="d-flex">Chất liệu: <span> Pha lê K9, hợp kim thép chống gỉ<span></li>
                                <li>Màu sắc : Trắng trong pha lê</li>
                                <li>Tình trạng : Còn hàng</li>
                                <li>Bảo hành: 10 năm</li>
                            </div>
                        </div>
                        <div class="product__detail--book">
                            <a class="product__button product__button--red product__book--bought" href = "#">
                                <b >Mua ngay</b>
                                <i class="fa fa-cart-arrow-down"></i>
                            </a>
                            <a class = "product__button product__button--black product__book--contact">
                                <b >Tư vấn ngay </b>
                                <i class="fas fa-phone-volume"></i>
                            </a>
                        </div>
                        <div class="product__detail--showroom">
                            <div class="product_showroom">
                            <span class=" product_showroom--title "style="color : black">KHÁCH HÀNG</span>
                            <span class=" product_showroom--sold" style="color : red">ĐÃ MUA</span>
                            </div>
                            <div class="product__showroom--location">
                            <?php for($i = 0; $i<4;$i++){ ?>
                            <div class="product_showroom--eachlocation">
                          

                            <i class="fas fa-map-marker-alt"></i>
                            <li>LK 12 - 41, KĐT An Hưng, Đường Tố Hữu, Q. Hà Đông, TP. Hà Nội</li>     
                            </div>
                            <?php } ?> 
                            </div>
                          
                    
                        </div>
                    </div>
                    <div class = "product__detail--staff col-12">
                        <div class = "product__staff--list">
                            <div class="product__button product__button--black product__list--titlte d-flex justify-content-center align-items-center">
                                <b>NHÂN VIÊN BÁN HÀNG</b>
                            </div>
                            <div class = "product__list--ad">
                                <?php for($i = 0 ; $i < 8; ++$i){ ?>
                                <div class="product__list--infor">
                                    <img src = "https://casani.vn/img/o/6.jpg" alt = "Huyền Trang">
                                    <span>Huyền Trang</span>
                                    <strong>0859.407.322</strong>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__detail--description"></div>
            </div>
        
        </div>
      
    </section>
   

@endsection
