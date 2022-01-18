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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                        <a href="{{ route('category', $mn2->slug) }}" class="category__frame--link">{{ $mn2->name }}</a>
                    </li>
                    @endif
                @endforeach
            @else
                @foreach ($menu2 as $mn2)
                    @if ($mn2->parent_menu_id == $menu->id)
                    <li class="category__frame--item col-6 col-sm-4 col-md-3">
                        <a href="{{ route('category', $mn2->slug) }}" class="category__frame--link">{{ $mn2->name }}</a>
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
          {{-- <p>Đèn chùm đồng từ ngày xưa đã rất được ưa chuộng và ứng dụng rộng rãi trong các không gian sang trọng, trang
            nghiêm
            như phòng khách, phòng thờ phòng khách, phòng thờ phòng khách, phòng thờ phòng khách, phòng thờ phòng khách, phòng thờ,… với tùy kiểu dáng, nhưng hầu hết là sản phẩm được làm bằng
            đồng thô được đánh bóng. Ngày nay, sản phẩm đèn chùm đồng đã được những bàn tay nghệ
            nhân thiết kế đa dạng hơn, không còn để thô như trước nữa. Nhưng vẫn phần nào giữ được
            nét đẹp truyền thống hư phòng khách, phòng thờ phòng khách, phòng thờ phòng khách, phòng thờ phòng khách, phòng thờ phòng khách, phòng thờ,… với tùy kiểu dáng, nhưng hầu hết là sản phẩm được làm bằng
            đồng thô được đánh bóng. Ngày nay, sản phẩm đèn chùm đồng đã được những bàn tay nghệ
            nhân thiết kế đa dạng hơn, không còn để thô như trước nữa. Nhưng vẫn phần nào giữ được
            nét đẹp truyền thống c của đèn chùm đồng ngày xưa. Điểm đặc biệt hơn ở mẫu đèn chùm làm bằng
            đồng hiện nay là được kết hợp thêm với những vật liệu cao cấp như pha lê k9, thủy tinh
            cao cấp, sử dụng công nghệ đèn led giúp giảm tiêu hao điện năng mà cung cấp ánh sáng tốt
            hơn nhưng vẫn mang lại vẻ đẹp truyền thống.<br><br>
            Đèn chùm đồng từ ngày xưa đã rất được ưa chuộng và ứng dụng rộng rãi trong các không gian sang trọng, trang
            nghiêm
            như phòng khách, phòng thờ,… với tùy kiểu dáng, nhưng hầu hết là sản phẩm được làm bằng
            đồng thô được đánh bóng. Ngày nay, sản phẩm đèn chùm đồng đã được những bàn tay nghệ
            nhân thiết kế đa dạng hơn, không còn để thô như trước nữa. Nhưng vẫn phần nào giữ được
            nét đẹp truyền thống của đèn chùm đồng ngày xưa. Điểm đặc biệt hơn ở mẫu đèn chùm làm bằng
            đồng hiện nay là được kết hợp thêm với những vật liệu cao cấp như pha lê k9, thủy tinh
            cao cấp, sử dụng công nghệ đèn led giúp giảm tiêu hao điện năng mà cung cấp ánh sáng tốt
            hơn nhưng vẫn mang lại vẻ đẹp truyền thống.
          </p> --}}
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
                        <div class="card-product--img"><img
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
            <?php for ($i = 0; $i < 10; ++$i) { ?>

            <?php }?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
      <div class="product__block product__block--chum">
        <div class="product__block--title">
          <h2>{{ $menu->name }}</h2>
          <div class="product__block--line"></div>
          <div class="product__block--link"><a href="">Xem tất cả</a></div>
        </div>
        <div class="product__block--list">
            @foreach ($products as $product)
            <div class="product__block--item col-6 col-sm-4 col-md-3">
                <a href="{{ route('category', $product->slug) }}">
                  <div class="card__product">
                    <div class="card-product--img"><img
                        src="{{ asset('upload/images/product/'. $product->image_1) }}" alt="" /></div>
                    <h3 class="card__product--name">{{ $product->name }}</h3>
                    <div class="card__product--price d-flex justify-content-between align-items-center">
                        @if (!($product->product_size()->get()->isEmpty()))
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
                                <div class="card-product--img"><img src="{{ asset('upload/images/product/'. $product_hot->image_1) }}" alt="" /></div>
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
        <div class="textmore__block">
          <div class="textmore__block--content textmore__block--content2">
            <span class="textmore__block--overlay"></span>
            <p>{!! $menu->content_2 !!}</p>
            {{-- <p>
              Đèn chùm pha lê giúp không gian nâng tầm đẳng cấp<br>
              Đèn chùm pha lê luôn là những mẫu đèn tạo được nhiều ấn tượng cũng
              như nhận được sự chú ý đông đảo của khách hàng. Những mẫu đèn chùm pha lê được làm từ những
              chất liệu nhập khẩu với khung đèn được làm từ chất liệu đồng nguyên chất, bền, tạo hình ấn
              tượng và đặc biệt không bị tác động ăn mòn của thời gian.
              Dù thời gian sử dụng có bao lâu thì khung đèn vẫn luôn bóng và rất dễ vệ sinh.
              <br>Pha lê là loại pha lê cao cấp nhất – loại pha lê K9. Trong bảng pha lê từ K1 đến K9 thì loại này có
              nhiều ưu điểm, đẹp nhất và giá trị nhất
              <br>Đèn chùm pha lê có thể lắp đặt trong nhiều không gian khác nhau.Từ phòng khách, phòng ăn, phòng ngủ…
              cho tới sảnh của các khách sạn, đèn chùm thả trong resort… Ở bất cứ đâu nó cũng làm toát lên sự tinh tế và
              đẳng cấp của không gian đó. Đặc biệt, tùy theo sở thích của chính gia chủ mà có thể chọn lựa cho mình mẫu
              đèn trùm cao cấp phong cách cổ điển hay hiện đại. Với những không gian rộng thì đèn chùm pha lê thông tầng
              là một gợi ý tuyệt vời.
              <br>Tùy thuộc vào sở thích mỗi người mà có thể chọn cho mình loại đèn chùm pha lê cao cấp giá rẻ khác
              nhau, đến từ các thương hiệu khác nhau. Nhiều mẫu đèn chùm được nhập khẩu từ Châu Âu, Tiếp Khắc, có những
              loại xuất xứ Trung Quốc thì tiền sẽ rẻ hơn nhưng chất lượng không cao bằng. Đồng thời, cũng cân nhắc vào
              không gian lắp đặt mà chọn đèn có kích thước lớn – nhỏ tương ứng tạo nên sự hài hòa và thống nhất.
              <br>Đèn chùm cổ điển – sự lắng đọng của thời gian
              <br><br>Đèn chùm cổ điển là thiết kế nội thất đặc biệt giúp không gian mang vẻ đẹp của thời gian. Các mẫu
              đèn chùm cổ điển luôn là một điểm nhấn ấn tượng mà bất cứ không gian nào lắp đặt. Từ chất liệu cho tới
              hình khối, màu sắc… Tất cả được chọn lựa cẩn thận, cân nhắc kỹ càng để hòa quyện với các món đồ nội thất
              khác trong không gian vô cùng ấn tượng đó.
              Đèn chùm phong cách cổ điển thường được làm từ những chất liệu truyền thống như đồng, thủy tinh cao cấp
              thổi thủ công, pha lê, sứ… Những chất liệu này mang trong mình những giá trị về chất liệu cũng như linh
              hồn. Vậy nên, trong những không gian sang trọng những mẫu đèn chùm đồng cổ điển luôn là sự lựa chọn không
              thể nào bỏ qua. Bên cạnh các mẫu đèn chùm bằng đồng, cũng có nhiều mẫu đèn chùm giả cổ thiết kế tinh tế,
              giá cả phải chăng giúp nhiều đối tượng khách hàng có thể cân nhắc cũng như chọn lựa.
              Đèn chùm phòng khách: sản phẩm đèn trang trí được lựa chọn nhiều nhất hiện nay
              <br><br>Trong tất cả các không gian lắp đặt đèn chùm thì phòng khách chính là không gian được sử dụng
              nhiều hơn cả. Các mẫu đèn chùm phòng khách hiện đại mang tới một hơi thở mới cho các không gian thiết kế
              theo phong cách trẻ trung. Đặc biệt các mẫu đèn chùm cho phòng khách chung cư, đèn chùm treo trần thạch
              cao được nhiều người chọn lựa hơn cả.
              Không quá rườm rà và cầu kì, các mẫu đèn chùm phòng khách đơn giản được làm từ các chất liệu đồng, pha lê,
              thủy tinh cao cấp… đều nhận được sự đón nhận và ủng hộ của đông đảo khách hàng.
              Các mẫu đèn chùm treo trần nhà phòng khách giúp cho không gian có được một hơi thở mới, một sự lột xác và
              tạo điểm nhấn cho dù đó chỉ là một phòng khách nhỏ.
              <br><br>Đèn chùm trang trí nhập khẩu châu Âu
              Các mẫu đèn chùm nhập khẩu châu Âu đến từ những thương hiệu có tiếng mang vẻ đẹp cổ điển và hoài niệm.
              Chính vì thế, với những không gian lắp đặt các mẫu đèn chùm châu Âu thường mang một vẻ đẹp lịch lãm và vô
              cùng sang trọng.
              Đèn chùm châu Âu cũng được làm nên từ nhiều chất liệu, nhưng 2 chất liệu phổ biến nhất chính là đồng và
              pha lê. Hai chất liệu này có ưu điểm đều có giá trị thẩm mỹ cũng như giá trị sản phẩm cao. Hơn nữa, phong
              cách hướng đến hiện nay không chỉ là phong cách cổ điển mà có cả phong cách hiện đại.
              Đèn chùm led – xu hướng chọn lựa của thời đại
              Các mẫu đèn chùm led được ưu ái cân nhắc và chọn lựa hơn rất nhiều so với các loại bóng đèn truyền thống
              trước đây. Với ưu điểm vượt trội về khả năng tiết kiệm điện, hiệu suất chiếu sáng cao và hiệu quả thẩm mỹ
              tuyệt vời. Đèn chùm bóng led có nhiều mẫu mã cho khách hàng có thể thoải mái và cân nhắc chọn lựa. Trong
              đó có đèn chùm led ốp trần hay các loại đèn thả trần đa dạng về mẫu mã, kích thước.
              Các mẫu đèn chùm nhà chung cư được thiết kế nhỏ gọn và vô cùng phù hợp với xu hướng nhà ở hiện đại. Là lựa
              chọn không thể bỏ qua khi khách hàng đang có nhu cầu quan tâm. Bạn hoàn toàn có thể định hình cho mình một
              phong cách cổ điển hoặc hiện đại. Và các mẫu đèn chùm hiện đại led cũng rất đa dạng để bạn chọn lựa.
              Đèn chùm phòng ngủ giúp không gian tinh tế nhẹ nhàng
              <br><br>Đèn chùm phòng ngủ thường là những mẫu đèn chùm nhỏ gọn, nhẹ nhàng được kết hợp với cường độ ánh
              sáng phù hợp và kiểu dáng tinh tế giúp cho không gian thanh thoát và ấm áp hơn. Khi chọn đèn chùm phòng
              ngủ cũng nên lưu ý một số vấn đề về việc chọn chất liệu, kiểu dáng. Tốt nhất, nên chọn kiểu dáng đơn giản
              và thanh lịch, cường độ ánh sáng vừa phải và màu đèn nên là màu vàng. Có nhiều mẫu đèn chùm phòng ngủ giá
              rẻ được làm từ các chất liệu khác nhau như pha lê, thủy tinh, sứ… cho khách hàng thoải mái chọn lựa.

              Đèn chùm nến trang trí phòng khách
              Các mẫu đèn chùm nến được khá nhiều người yêu thích cũng như chọn lựa hiện nay. Đèn chùm nến thường được
              thiết kế theo phong cách cổ điển và được nhiều người yêu thích cũng như chọn lựa. Các chất liệu làm nên
              đèn chùm nến thường là những chất liệu cao cấp như: đồng, pha lê hoặc cũng có thể là các chi tiết mạ vàng
              giúp sản phẩm thêm sang trọng.

              <br><br>Đèn chùm nến trang trí được sử dụng tại phòng khách, sảnh lớn tại khách sạn nhà hàng hay resort…

              Cách lắp đèn chùm phù hợp với từng không gian
              Ngày nay, việc chọn lựa cũng như lắp đặt đèn chùm cần phải hết sức lưu ý và cân nhắc theo phong thủy. Nếu
              lắp đặt phù hợp thì chắc chắn rằng gia chủ sẽ có thêm tài lộc cũng như may mắn.

              Nếu lắp đèn chùm trang trí đẹp tại không gian phòng khách thì nên lắp ở chính giữa không gian cũng như
              thẳng vị trí cửa chính giữa bước vào. Điều này giúp luồng khí dương được hút vào mang tới nhiều vận khí.

              Bên cạnh đó, nếu lắp đèn tại vị trí bàn ăn hay không ngủ thì nên cân nhắc lắp ngay trên bàn ăn hoặc chính
              giữa phòng ngủ cũng sẽ giúp tăng cường khí dương cho không gian.

              <br><br>Địa chỉ mua đèn chùm phòng khách hiện đại giá rẻ uy tín
              Chọn lựa và lắp đặt đèn chùm phòng khách hiện đại giá rẻ giúp cho không gian ngôi nhà của bạn trở nên hoàn
              hảo cũng như có điểm nhấn. Chọn lựa hợp lý chắc chắn sẽ giúp cho không gian được tôn vinh với vẻ đẹp sang
              trọng, lịch lãm. Đồng thời, nếu biết cách chọn lựa cũng như lắp đặt, chắc chắn đèn chùm rẻ đẹp sẽ giúp
              không gian của bạn phong thủy hơn.

              Trên thị trường hiện nay xuất hiện rất nhiều địa chỉ bán đèn chùm khiến khách hàng như lạc vào thế giới
              đèn chùm. Nhưng tìm được một địa chỉ uy tín, chất lượng bán đèn chùm rẻ mà chất lượng vẫn được đảm bảo thì
              không phải là điều đơn giản. Tuy nhiên, nếu bạn vẫn chưa tìm được cho mình một nơi để mua đèn chùm thì hãy
              đến với Sundecor. Chắc chắn, chúng tôi sẽ khiến bạn hài lòng.
              <br><br>
              Sundecor chuyên cung cấp tới khách hàng các loại đèn chùm cao cấp với mẫu mã đa dạng, chủng loại phong
              phú, nhập khẩu trực tiếp từ các thương hiệu lớn. Đồng thời, chúng tôi cũng có rất nhiều mẫu đèn chùm trang
              trí giá rẻ phù hợp với túi tiền nhiều khách hàng. Cùng với đó, các chương trình giảm giá khuyến mại từ 50
              – 60% thường xuyên được diễn ra giúp khách hàng có thể chọn được những sản phẩm chất lượng mà giá tốt.

              Để được báo giá đèn chùm nhanh chóng và tiện lợi nhất vui lòng gọi điện tới số Hotline: 0942.83.77.99 -
              0987.02.55.88 hoặc tới trực tiếp showroom LK 06 - 28, KĐT An Hưng, Đường Tố Hữu,Q. Hà Đông, TP. Hà Nội.
            </p> --}}
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
