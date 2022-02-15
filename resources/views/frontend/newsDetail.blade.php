@extends('frontend.layout.main')
@section('content')
    <section>
        <div class="product__detail">
            <div class="main-container product__container">
                <div class="row product__detail--row">
                    <div class="product__detail--left col-12 row">
                        detail New
                        {{-- biến trang này là $new --}}
                    </div>
                    <div class="product__detail--right col-12 row">
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
                </div>
                <!-- Your embedded comments code -->
                <div class="fb-comments" data-href="https://chinh.fun/" data-width="100%" data-numposts="5"></div>
                @include('frontend.include.video')
                @include('frontend.include.construct')
            </div>
        </div>
        <script>
            function selectPrice(id) {
                const form = document.getElementById('form_cart');

                var productSize_id = document.getElementById('product_size_id');
                if(productSize_id){
                    console.log(productSize_id);
                    productSize_id.remove();
                }

                productSize_id = document.createElement("input");
                productSize_id.setAttribute('name', 'product_size_id');
                productSize_id.setAttribute('id', 'product_size_id');
                productSize_id.setAttribute('type', 'hidden');
                productSize_id.setAttribute('value', id);
                form.appendChild(productSize_id);
                console.log(productSize_id);
            }
        </script>
        @include('frontend.include.voucher')
        @include('frontend.include.news')
        @include('frontend.include.service')
    </section>

@endsection
