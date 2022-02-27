@extends('frontend.layout.main')
@section('content')
    <section>
        <div class="product__detail page-thanks">
            <div class="main-container product__container">
                <div class="row product__detail--row">
                    <div class="product__detail--left col-12 row">
                        <div class="page-thanks__img col-12">
                            <img src="{{asset('frontend/images/thanks/thankyou.png')}}" alt="thanks you">
                        </div>
                        <div class="page-thanks__note col-12">
                            Sundecor sẽ liên hệ tới quý khách sớm nhất có thể!
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
                @include('frontend.include.video')
                {{-- @include('frontend.include.construct') --}}
            </div>
        </div>
        @include('frontend.include.voucher')
        @include('frontend.include.news')
        @include('frontend.include.service')
    </section>

@endsection
