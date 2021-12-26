@extends('admin.layout.main')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.promotion.index')}}">Danh Sách Khách Hàng</a></h3>
                        </div>
                        <div class="right no-click">
                            {{-- <h3 class="card-title"><a href="{{route('admin.product.create')}}"></a></h3> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-2">Họ và tên</th>
                                    <th class="col-2">Số điện thoại</th>
                                    <th class="col-3">Mô tả</th>
                                    <th class="col-2">Trạng thái</th>
                                    <th class="col-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $key => $promotion)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $promotion->fullname }}</td>
                                        <td>{{ $promotion->tel }}</td>
                                        <td>{{ $promotion->description }}</td>
                                        <td>{{ $promotion->status == 1 ? "Đã liên hệ" : "Chưa liên hệ" }}</td>
                                        <td style="display: flex;">
                                            <a href="{{ route('admin.promotion.edit', $promotion) }}" class="btn btn-primary">Sửa</a>
                                            <form action="{{ route('admin.promotion.destroy', $promotion) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection