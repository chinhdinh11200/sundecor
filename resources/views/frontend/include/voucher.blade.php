<div class="voucher__block">
  <div class="main-container">
    <div class="row voucher__block--content">
      <h2 class="col-12 col-md-12 voucher__block--title">Nhận voucher giảm giá</h2>
      <div class="voucher__block--left col-12 col-md-6 d-flex flex-column">
        <div class="voucher__block--note text-center">Thời gian chỉ còn</div>
        <?php
          date_default_timezone_set('Asia/Ho_Chi_Minh');
          $day_start = "2021-11-21";
          $day_now = date("Y-m-d");
          $diff_day = date_diff(date_create($day_start),date_create($day_now));
          $diff_day = $diff_day->format("%a");
          $convert_to_seconds = 86400*3 - (date('H')*3600 + date('i')*60 + date('s') + ($diff_day%3)*86400);
          $day = floor($convert_to_seconds/86400);
          $hours = floor($convert_to_seconds%86400/3600);
          $minutes = floor($convert_to_seconds%86400%3600/60);
          $seconds = floor($convert_to_seconds%86400%3600%60);
          echo "<script>";
          echo "setInterval(function(){
              $('.voucher__block--seconds').text(".$seconds.");
          }, 1000);";
          echo "</script>";
        ?>
        <div class="voucher__block--date row">
          <div class="voucher__block--time col-3 text-center voucher__block--day">
            <span>ngày</span>
          </div>
          <div class="voucher__block--time col-3 text-center voucher__block--hours">09<span>giờ</span></div>
          <div class="voucher__block--time col-3 text-center voucher__block--minutes">10<span>phút</span></div>
          <div class="voucher__block--time col-3 text-center voucher__block--seconds">
            <span>giấy</span>
          </div>
        </div>
      </div>
      <div class="voucher__block--right col-12 col-md-5">
          <form class="voucher__block--form d-flex flex-column" action="">
            <input class="voucher__block--input" type="text" placeholder="Nhập họ và tên" />
            <input class="voucher__block--input" type="text" placeholder="Nhập số điện thoại" />
            <input class="voucher__block--input" type="text" placeholder="Nội dung cần cung cấp" />
            <button class="voucher__block--button d-flex justify-content-center align-items-center">gửi ngay</button>
          </form>
      </div>
    </div>
  </div>
</div>