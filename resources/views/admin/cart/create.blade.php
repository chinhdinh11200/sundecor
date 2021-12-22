@extends('admin.layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="left no-click">
                <h3 class="card-title"><a href="{{route('admin.cart.index')}}">Danh Sách Sản Phẩm</a></h3>
            </div>
            <div class="right">
                <h3 class="card-title"><a href="{{route('admin.cart.create')}}">Thêm Sản Phẩm</a></h3>
            </div>
        </div>

        <form role="form" action="{{ route('admin.cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Chọn product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Session</label>
                    <input type="text" name="session_id" id="session_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">phone_number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <a href="" type="button" class="btn btn-primary" id="submit1">Subm111it</a>
            </div>

        </form>
    </div>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>

@endsection
