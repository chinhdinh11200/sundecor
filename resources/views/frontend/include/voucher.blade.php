<div class="voucher__block">
  <div class="main-container">
    <div class="row voucher__block--content">
      <h2 class="col-12 col-md-12 voucher__block--title">Nhận voucher giảm giá</h2>
      <div class="voucher__block--left col-12 col-md-6 d-flex flex-column">
        <div class="voucher__block--note text-center">Thời gian chỉ còn</div>
        <div class="voucher__block--date row">
          <div class="voucher__block--time col-3 text-center voucher__block--day">
            <span>ngày</span>
          </div>
          <div class="voucher__block--time col-3 text-center voucher__block--hours">
            <span>giờ</span>
          </div>
          <div class="voucher__block--time col-3 text-center voucher__block--minutes">
            <span>phút</span>
          </div>
          <div class="voucher__block--time col-3 text-center voucher__block--seconds">
            <span>giấy</span>
          </div>
        </div>
      </div>
      <div class="voucher__block--right col-12 col-md-5">
          <form class="voucher__block--form d-flex flex-column" action="{{ route('consultation.register') }}" method="POST">
            @csrf
            <input class="voucher__block--input" type="text" placeholder="Nhập họ và tên" name="fullname"/>
            @if($errors->has('fullname'))
                <p style="color: red">{{ $errors->first('fullname') }}</p>
            @endif
            <input class="voucher__block--input" type="text" placeholder="Nhập số điện thoại" name="tel"/>
            @if($errors->has('tel'))
                <p style="color: red">{{ $errors->first('tel') }}</p>
            @endif
            <input class="voucher__block--input" type="text" placeholder="Nội dung cần cung cấp" name="description"/>
            <button type="submit" class="voucher__block--button d-flex justify-content-center align-items-center">gửi ngay</button>
          </form>
      </div>
    </div>
  </div>
</div>
