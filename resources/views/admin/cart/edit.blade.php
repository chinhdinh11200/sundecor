@extends('admin.layout.main')
@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <div class="left no-click">
                <h3 class="card-title"><a href="{{route('admin.cart.index')}}">Danh Sách Sản Phẩm</a></h3>
            </div>
            <div class="right">
                <h3 class="card-title"><a href="{{route('admin.cart.create')}}">Thêm Sản Phẩm</a></h3>
            </div>
        </div> --}}

        <form role="form" action="{{ route('admin.cart.update', $cart->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" name="fullname" class="form-control" value="{{ $cart->fullname }}">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $cart->phone_number }}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $cart->email }}">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="{{ $cart->address }}">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{ $cart->name }}">
                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="text" name="quantity" class="form-control" value="{{ $cart->quantity }}">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select type="text" name="status" class="form-control">
                        <option value="0" {{ $cart->status == 0 ? "selected" : ""}}>Chưa thanh toán</option>
                        <option value="1" {{ $cart->status == 1 ? "selected" : ""}}>Đã thanh toán</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

@endsection
