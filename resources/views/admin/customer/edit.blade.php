@extends('admin.layout.main')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="left no-click">
                <h3 class="card-title">
                    <a href="{{ route('admin.customer.index') }}">Danh sách</a>
                </h3>
            </div>
            <div class="right">
                <h3 class="card-title">
                    <a href="{{ route('admin.customer.create') }}">Thêm mới</a>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Họ và tên : </label>
                        <input type="text" id="name" name="name" value="{{ $customer->name }}"  class="form-control" placeholder="Họ và tên khách hàng">
                        @if($errors->has('name'))
                            <p style="color: red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại : </label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ $customer->phone_number }}" class="form-control" placeholder="Số điện thoại khách hàng">
                        @if($errors->has('phone_number'))
                            <p style="color: red">{{ $errors->first('phone_number') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ : </label>
                        <input type="text" id="address" name="address" value="{{ $customer->address }}" class="form-control" placeholder="Địa chỉ khách hàng">
                        @if($errors->has('address'))
                            <p style="color: red">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>

@endsection
