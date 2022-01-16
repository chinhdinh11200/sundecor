<!-- Navbar -->
@include('admin.layout.header', ['text' => 'consultation'])
<!-- /.navbar -->
@extends('admin.layout.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.consultation.index')}}">Danh Sách Khách Hàng</a></h3>
                        </div>
                        <div class="right no-click">
                            {{-- <h3 class="card-title"><a href="{{route('admin.product.create')}}"></a></h3> --}}
                        </div>
                    </div>
                    <form action="" class="card-option">
                        <select name="" id="" class="form-control" area onchange="window.location=this.value">
                            <option value="{{ route('admin.consultation.index') }}" selected>---- Chọn trạng thái ----</option>
                            <option value="{{ route('admin.consultation.classify', 0) }}">Chưa liên hệ</option>
                            <option value="{{ route('admin.consultation.classify', 1) }}">Đã liên hệ</option>
                        </select>
                    </form>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-2">Họ và tên</th>
                                    <th class="col-2">Số điện thoại</th>
                                    <th class="col-3">Mô tả</th>
                                    <th class="col-2">Trạng thái</th>
                                    <th class="col-4">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultations as $key => $consultation)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $consultation->fullname }}</td>
                                        <td>{{ $consultation->tel }}</td>
                                        <td>{{ $consultation->description }}</td>
                                        <td>{{ $consultation->status == 1 ? "Đã liên hệ" : "Chưa liên hệ" }}</td>
                                        <td style="vertical-align: middle">
                                            <div class="d-flex justify-content-center" style="max-height: 38px">
                                                <a href="{{ route('admin.consultation.edit', $consultation) }}" class="btn btn-primary mr-3">Sửa</a>
                                                <form action="{{ route('admin.consultation.destroy', $consultation) }}" method="POST">
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
                        {{$consultations->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
