<!------------------- footer ---------------------->
	<footer id="footer">
        <div class="footer__blackground"></div>
        <div class="main-container">
            <div class="row footer__row">
                <div class="col-md-2 footer__col">
                    <!-- <h3 class="footer__title">Hà Nội </h3>
                    <ul class="footer__list">
                        <li class="footer__item mb-30"><a class="footer__link"> 0978.285.888<br></a><a class="footer__link"> LK 12 - 41, KĐT An hưng,<br>đường tố hữu, Q. Hà đông.<br><span>(Có chỗ để ô tô)</span></a></li>
                    </ul>
                    <h3 class="footer__title">Sài Gòn</h3>
                    <ul class="footer__list">
                        <li class="footer__item"> <a class="footer__link">0978.285.888<br></a><a class="footer__link">2C - đường đồng văn cống,<br>Khu phố 3, p bình trưng tây, q2<br><span>(Có chỗ để ô tô)</span></a></li>
                    </ul> -->
                    {!! $webInfo->address !!}
                </div>
                <div class="col-md-3 footer__col">
                    <h3 class="footer__title"> Công ty cp tm đầu tư<br>xây dựng gia phát</h3>
                    <div class="footer__list">
                        <div class="footer__item"><a class="footer__link">Mã số thuế:</a></div>
                        <div class="footer__item"><a class="footer__link">Mở cửa: 8h00 đến 18h00</a></div>
                        <div class="footer__item"><a class="footer__link">Email: Sale@sundecor.vn</a></div>
                    </div>
                </div>
                <div class="col-md-1 footer__col">
                    <div class="footer__nav">
                        <ul class="footer__nav--list">
                            @foreach ($menu_bottoms as $menu_bottom)
                                <li class="footer__nav--item"><a class="footer__nav--link" href="{{ route('category', $menu_bottom->slug) }}">{{ $menu_bottom->name }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-3 footer__col">
                    <h3 class="footer__title">Kết nối với sundecor </h3>
                    <div class="row footer__social-network mb-30">
                        <div class="col-2 footer__social-network--item"> <a href="#"><img src="{{asset('frontend/images/common/icon-facebook.png')}}" alt=""></a></div>
                        <div class="col-2 footer__social-network--item"><a href="#"><img src="{{asset('frontend/images/common/icon-twitter.png')}}" alt=""></a></div>
                        <div class="col-2 footer__social-network--item"><a href="#"><img src="{{asset('frontend/images/common/icon-tumblr.png')}}" alt=""></a></div>
                        <div class="col-2 footer__social-network--item"><a href="#"><img src="{{asset('frontend/images/common/icon-google.png')}}" alt=""></a></div>
                        <div class="col-2 footer__social-network--item"><a href="#"><img src="{{asset('frontend/images/common/icon-internet.png')}}" alt=""></a></div>
                    </div>
                    <h3 class="footer__title">Chấp nhận thanh toán </h3>
                    <div class="row footer__banking">
                        <div class="col-3 footer__banking--item"> <a class="justify-content-center align-items-center d-flex">
                                <div class="justify-content-center align-items-center d-flex footer__banking--img background-white"><img src="{{asset('frontend/images/common/img-visa.png')}}" alt=""></div>
                            </a></div>
                        <div class="col-3 footer__banking--item"> <a class="justify-content-center align-items-center d-flex">
                                <div class="justify-content-center align-items-center d-flex footer__banking--img background-white"><img src="{{asset('frontend/images/common/img-paypal.png')}}" alt=""></div>
                            </a></div>
                        <div class="col-3 footer__banking--item"> <a class="justify-content-center align-items-center d-flex">
                                <div class="justify-content-center align-items-center d-flex footer__banking--img background-white"><img src="{{asset('frontend/images/common/img-mastercard.png')}}" alt=""></div>
                            </a></div>
                        <div class="col-3 footer__banking--item"> <a class="justify-content-center align-items-center d-flex">
                                <div class="justify-content-center align-items-center d-flex footer__banking--img"><img src="{{asset('frontend/images/common/img-bank.png')}}" alt=""></div>
                            </a></div>
                    </div>
                    <div class="footer__bct">
                        <a href="http://online.gov.vn/Home/WebDetails/39668">
                            <img src="{{asset('frontend/images/common/img-bct.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 footer__col">
                    <div class="footer__fanpage">
                        <iframe name="f1ca65bf6bada1c" width="100%" height="250px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2a2a0eed86739%26domain%3Dsundecor.vn%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fsundecor.vn%252Ff36cbabef30e564%26relation%3Dparent.parent&amp;container_width=0&amp;height=250&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftongkhodendecor&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=true&amp;small_header=true&amp;width=300" style="border: none; visibility: visible; height: 250px;" class=""></iframe>
                    </div>
                    <div class="footer__video">
                        <iframe class="footer__video--iframe" width="100%" src="https://www.youtube.com/embed/1dmR0ZyKkwI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/js/common.js')}}"></script>
