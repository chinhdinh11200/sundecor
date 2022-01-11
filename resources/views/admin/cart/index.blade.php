@extends('admin.layout.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="left">
                        <h3 class="card-title"><a href="{{route('admin.cart.index')}}">Danh Sách</a></h3>
                    </div>
                    <div class="right no-click">
                        <h3 class="card-title"><a href="{{route('admin.cart.create')}}">Thêm giỏ hàng</a></h3>
                    </div>
                </div>

                <form action="" class="card-option">
                    <select name="" id="" aria-label="Default select example" class="form-control" onchange="window.location=this.value">
                        <option value="{{ route('admin.bill.index') }}">---- Chọn trạng thái ----</option>
                        <option value="{{ route('admin.bill.classify', 0) }}">Chưa thanh toán</option>
                        <option value="{{ route('admin.bill.classify', 1) }}">Đã thanh toán</option>
                    </select>
                </form>

                <div class="card-body">
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Trạng thái</label>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="">Tất cả</option>
                            @foreach (array_keys($status) as $key=> $value)
                                <option value="{{ $value }} ">{{ $status[$key] }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Tên sản phẩm</th>
                                <th>số điện thoại</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($carts as $key => $cart)
                               <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $cart->fullname }}</td>
                                    <td>{{ $cart->name }}</td>
                                    <td>{{ $cart->phone_number }}</td>
                                    <td>{{ $cart->sell_price * $cart->quantity }}</td>
                                    <td>{{ $cart->status }}</td>
                                    <td>{{ $cart->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.bill.edit', $cart->id_bill) }}" class="btn btn-primary">sửa</a>
                                        <form action="{{ route('admin.bill.destroy', $cart->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">xóa</button>
                                        </form>
                                    </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('cart.create') }}" method="POST" class="d-flex mt-2">
                        @csrf
                        <input type="" name="session_id" class="form-control col-4 mr-2" id="session_id">
                        <select type="text" name="product_id" class="form-control col-4">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>

                        <button class="btn btn-primary" type="submit">Cart</button>
                    </form>

                    {{-- <form action="{{ route('cart.index') }}" method="post">
                        @csrf
                        <input type="hidden" name="session_id" id="session_id">
                        <button class="btn btn-primary" type="submit">View Cart</button>
                    </form> --}}
                </div>

                <div class="box-trang">
                    {{$carts->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
@endsection
