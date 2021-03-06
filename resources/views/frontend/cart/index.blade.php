@extends('frontend.layout.main', ['cart_quantity' => $cart_quantity])

@section('content')
<section>
    <div class="page-cart">
        <div class="breadcrumb__block">
        <div class="main-container">
            <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
            </nav>
        </div>
        </div>
        <div class="main-container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <form role="form" action="{{ route('cart.update') }}" method="POST"> --}}
                            {{-- @csrf --}}
                            <div class="card-body">
                                <table class="table table-bordeqred">
                                    <thead>
                                        <tr>
                                            <th class="col-1">STT</th>
                                            <th class="col-1">Ảnh</th>
                                            <th class="col-6">Tên sản phẩm</th>
                                            <th class="col-1">Giá bán</th>
                                            <th class="col-1">Số lượng</th>
                                            <th class="col-1">Thành tiền</th>
                                            <th class="col-1"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf --}}
                                            {{-- <input type="hidden" name="session_id" id="session_id"> --}}
                                            @foreach ($carts as $key => $cart )
                                            <tr>
                                                <input type="hidden" name="product_id" id="product_id" value="{{ $cart->product_id }}">
                                                {{-- cập nhật đơn hàng --}}
                                                <input type="hidden" name="cart_id" id="cart_id" value="{{ $cart->id }}">
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset('upload/images/product') .'/'. $cart->image_1 }}" alt="Ảnh" style="width: 80px">
                                                </td>
                                                <td>
                                                    {{ $cart->name. ' ('.$cart->size . ')' }}
                                                </td>
                                                <td>
                                                    @if(isset($cart->sale_price))
                                                        {{ number_format($cart->sale_price) }} đ
                                                    @else
                                                        Liên hệ
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="text" name="quantity" id={{ "quantity". $cart->id }} value="{{ $cart->quantity }}" style="width: 100px" class="text-center">
                                                </td>
                                                <td>
                                                    @if(isset($cart->sale_price))
                                                    {{ number_format($cart->sale_price* $cart->quantity) }} đ
                                                    @else
                                                        Liên hệ
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="session_id" id="session_id">
                                                        <input type="hidden" name="id" id="id" value="{{ $cart->id }}">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach ($cart_contacts as $key => $cart)
                                            <tr>
                                                <input type="hidden" name="product_id" id="product_id" value="{{ $cart->product_id }}">
                                                {{-- cập nhật đơn hàng --}}
                                                <input type="hidden" name="cart_id" id="cart_id" value="{{ $cart->id }}">
                                                <td>
                                                    {{ count($carts) + $key + 1}}
                                                </td>
                                                <td>
                                                    <img src="{{ asset('upload/images/product') .'/'. $cart->image_1 }}" alt="Ảnh" style="width: 80px">
                                                </td>
                                                <td>
                                                    {{ $cart->name. ' ('.$cart->size . ')' }}
                                                </td>
                                                <td>
                                                    @if(isset($cart->sale_price))
                                                        {{ number_format($cart->sale_price) }} đ
                                                    @else
                                                        Liên hệ
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="text" name="quantity" id={{ "quantity". $cart->id }} value="{{ $cart->quantity }}" style="width: 100px" class="text-center">
                                                </td>
                                                <td>
                                                    @if(isset($cart->sale_price))
                                                    {{ number_format($cart->sale_price* $cart->quantity) }} đ
                                                    @else
                                                        Liên hệ
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="session_id" id="session_id">
                                                        <input type="hidden" name="id" id="id" value="{{ $cart->id }}">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        {{-- </form> --}}
                                    </tbody>
                                </table>
                                <span>Tổng tiền : </span><span class="mt-4" id="total">&ensp;&ensp;&ensp;&ensp;&ensp;{{ number_format($total) }} đ</span> <br>

                                <button class="btn btn-success mt-4" id="updateCart" >Cập nhật đơn hàng</button>


                                <div class="mt-4">
                                    <form role="form" action="{{ route("bill.create") }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" id="session_id">
                                        <div class="form-group">
                                            <label for="">Tên khách hàng</label>
                                            <input type="text" name="fullname" class="form-control">
                                            @if($errors->has('fullname'))
                                                <p style="color: red">{{ $errors->first('fullname') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giới tính</label>
                                            <select type="text" name="gender" class="form-control">
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" name="phone_number" class="form-control">
                                            @if($errors->has('phone_number'))
                                                <p style="color: red">{{ $errors->first('phone_number') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" name="address" class="form-control">
                                            @if($errors->has('address'))
                                                <p style="color: red">{{ $errors->first('address') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                            @if($errors->has('email'))
                                                <p style="color: red">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <input type="textarea" name="description" class="form-control">
                                        </div>

                                        <div class="form-group mt-4">
                                            <button class="btn btn-success" id="order" type="submit">Đặt hàng</button>
                                            <a href="{{ route('web') }}" class="btn btn-warning">Mua tiếp</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/js/common.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
    <script>
        $(document).ready(function () {
            fetch(`/cart_quantity?session_id=${localStorage.getItem('session_id')}`)
                .then((res) => res.json())
                .then((data) => {
                    localStorage.setItem('quantity', data)
                })
        });
    </script>
@endsection
