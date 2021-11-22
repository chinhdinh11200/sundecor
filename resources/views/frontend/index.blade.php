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
            <div class="product__block product__block--chum">
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
            </div>
            <div class="made__block">
                <h2 class="made__block--heading">video dự án đã thực hiện</h2><a class="made__block--link" href="#">xem tất cả</a>
                <div class="row made__block--list">
                    <div class="col-md-4 made__block--item"><iframe width="100%" height="240" src="https://www.youtube.com/embed/ewG-nAO1kos" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        <h3 class="made__block--name">Trải nghiệm biệt thự 50 tỷ nhà anh đồng số nhà 28 liền kề 06 khu đô thị an hưng</h3>
                    </div>
                    <div class="col-md-4 made__block--item"><iframe width="100%" height="240" src="https://www.youtube.com/embed/ewG-nAO1kos" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        <h3 class="made__block--name">Trải nghiệm biệt thự 50 tỷ nhà anh đồng số nhà 28 liền kề 06 khu đô thị an hưng siêu đẹp và siêu sang</h3>
                    </div>
                    <div class="col-md-4 made__block-item"><iframe width="100%" height="240" src="https://www.youtube.com/embed/ewG-nAO1kos" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        <h3 class="made__block--name">Trải nghiệm biệt thự 50 tỷ nhà anh đồng số nhà 28 liền kề 06 khu đô thị an hưng</h3>
                    </div>
                </div>
            </div>
            <div class="made__block made__block--construct">
                <h2 class="made__block--heading">công trình đã thực hiện</h2><a class="made__block--link" href="#">xem tất cả</a>
                <div class="row made__block--list">
                    <?php for ($i = 0; $i < 8; ++$i) { ?>
                        <div class="col-md-3 made__block--item">
                            <a href="#">
                                <div class="made__block--img"><img src="https://sundecor.vn/img/n/huong-dan-ban-chon-den-chum-kieu-hien-dai-phu-hop-voi-khong-gian.jpg" alt="" /></div>
                                <h3 class="made__block--name">Trải nghiệm biệt thự 50 tỷ nhà anh đồng số nhà 28 liền kề 06 khu đô thị an hưng</h3>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="voucher__block">
            <div class="main-container">
                <div class="row voucher__block--content">
                    <h2 class="col-12 col-md-12 voucher__block--title">Nhận voucher giảm giá</h2>
                    <div class="voucher__block--left col-12 col-md-6 d-flex flex-column">
                        <div class="voucher__block--note text-center">Thời gian chỉ còn</div>
                        <div class="voucher__block--date row">
                            <div class="voucher__block--time col-3 text-center voucher__block--day">00<span>ngày</span></div>
                            <div class="voucher__block--time col-3 text-center voucher__block--hours">09<span>giờ</span></div>
                            <div class="voucher__block--time col-3 text-center voucher__block--minutes">10<span>phút</span></div>
                            <div class="voucher__block--time col-3 text-center voucher__block--seconds">00<span>giấy</span></div>
                        </div>
                    </div>
                    <div class="voucher__block--right col-12 col-md-5">
                        <form class="voucher__block--form d-flex flex-column" action=""><input class="voucher__block--input" type="text" placeholder="Nhập tên" /><input class="voucher__block--input" type="text" placeholder="Nhập số điện thoại" /><input class="voucher__block--input" type="text" placeholder="Nội dung cần cung cấp" /><button class="voucher__block--button d-flex justify-content-center align-items-center">gửi ngay</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection