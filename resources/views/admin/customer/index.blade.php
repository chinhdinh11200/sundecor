<!-- Navbar -->
@include('admin.layout.header', ['text' => 'customer'])
<!-- /.navbar -->
@extends('admin.layout.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.customer.index')}}">Danh Sách Khách Hàng</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.customer.create')}}">Thêm mới khách hàng</a></h3>
                        </div>
                    </div>
                    <form action="" class="card-option">
                        {{-- <select name="" id="" class="form-control" area onchange="window.location=this.value">
                            <option value="{{ route('admin.customer.index') }}" selected>---- Chọn trạng thái ----</option>
                            <option value="{{ route('admin.customer.classify', 0) }}">Chưa liên hệ</option>
                            <option value="{{ route('admin.customer.classify', 1) }}">Đã liên hệ</option>
                        </select> --}}
                    </form>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-2">Họ và tên</th>
                                    <th class="col-2">Số điện thoại</th>
                                    <th class="col-4">Địa chỉ</th>
                                    <th class="col-2">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $key+1 }}</td>
                                        <td style="vertical-align: middle">{{ $customer->name }}</td>
                                        <td style="vertical-align: middle">{{ $customer->phone_number }}</td>
                                        <td style="vertical-align: middle">{{ $customer->address }}</td>
                                        <td style="vertical-align: middle">
                                            <div class="d-flex justify-content-center" style="max-height: 38px">
                                                <a href="{{ route('admin.customer.edit', $customer) }}" class="btn btn-primary mr-3">Sửa</a>
                                                <form action="{{ route('admin.customer.destroy', $customer) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="box-trang">
                        {{$customers->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
