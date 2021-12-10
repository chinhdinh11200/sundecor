@extends('frontend.layout.main')
@section('content')
<section>
    <div class="main-container compressed__intro">
        <div class="compressed_intro--text">
            <h2>ĐÈN CHÙM ĐỒNG ITALY ĐẲNG CẤP VÀ SANG TRỌNG</h2>
            <p>Đèn chùm đồng từ ngày xưa đã rất được ưa chuộng và ứng dụng rộng rãi trong các không gian sang trọng, trang nghiêm như phòng khách, phòng thờ,… với tùy kiểu dáng, nhưng hầu hết là sản phẩm được làm bằng đồng thô được đánh bóng. Ngày nay, sản phẩm đèn chùm đồng đã được những bàn tay nghệ nhân thiết kế đa dạng hơn, không còn để thô như trước nữa. Nhưng vẫn phần nào giữ được nét đẹp truyền thống của đèn chùm đồng ngày xưa. Điểm đặc biệt hơn ở mẫu đèn chùm làm bằng đồng hiện nay là được kết hợp thêm với những vật liệu cao cấp như pha lê k9, thủy tinh cao cấp, sử dụng công nghệ đèn led giúp giảm tiêu hao điện năng mà cung cấp ánh sáng tốt hơn nhưng vẫn mang lại vẻ đẹp truyền thống.</p>
        </div>
        <div class="product__block product__block--sale">
                <div class="product__block--title">
                    <h2>Sản phẩm Đèn chùm đồng bán chạy</h2>
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
            <div class="product__block product__block--chum">
                <div class="product__block--title">
                    <h2>Đèn chùm đồng Italy</h2>
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
    </div>
    
</section>

@endsection