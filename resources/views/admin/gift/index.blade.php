<!-- Navbar -->
@include('admin.layout.header', ['text' => 'gift'])
<!-- /.navbar -->
@extends('admin.layout.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.gift.index')}}">Danh Sách Khách Hàng</a></h3>
                        </div>
                        <div class="right no-click">
                            {{-- <h3 class="card-title"><a href="{{route('admin.product.create')}}"></a></h3> --}}
                        </div>
                    </div>
                    <form action="" class="card-option">
                        <select name="" id="" class="form-control" area onchange="window.location=this.value">
                            <option value="{{ route('admin.gift.index') }}" selected>---- Chọn trạng thái ----</option>
                            <option value="{{ route('admin.gift.classify', 0) }}">Chưa liên hệ</option>
                            <option value="{{ route('admin.gift.classify', 1) }}">Đã liên hệ</option>
                        </select>
                    </form>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-3">Tên sản phẩm</th>
                                    <th class="col-2">Số điện thoại</th>
                                    <th class="col-2">Trạng thái</th>
                                    <th class="col-2">Trạng thái</th>
                                    <th class="col-2">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gifts as $key => $gift)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $gift->product->name }}</td>
                                        <td>{{ $gift->tel }}</td>
                                        <td>{{ $gift->created_at }}</td>
                                        <td>{{ $gift->status == 1 ? "Đã liên hệ" : "Chưa liên hệ" }}</td>
                                        <td style="vertical-align: middle">
                                            <div class="d-flex justify-content-center" style="max-height: 38px">
                                                <a href="{{ route('admin.gift.edit', $gift->id) }}" class="btn btn-primary mr-3">Sửa</a>
                                                <form action="{{ route('admin.gift.destroy', $gift->id) }}" method="POST">
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
                        {{$gifts->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
