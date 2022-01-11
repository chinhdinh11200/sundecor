<!-- Navbar -->
@include('admin.layout.header', ['text' => 'supporter'])
<!-- /.navbar -->
@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title">
                                <a href="{{ route('admin.supporter.index') }}">Danh sách</a>
                            </h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title">
                                <a href="{{ route('admin.supporter.create') }}">Thêm mới</a>
                            </h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-2">Ảnh</th>
                                    <th class="col-5">Tên</th>
                                    <th class="col-2">Số điện thoại</th>
                                    <th class="col-1">Sắp xếp</th>
                                    <th class="col-1">Trạng thái</th>
                                    <th class="col-2">Edit</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($supporters as $key => $supporter)
                                    <tr class="class">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ $supporter->image ?  asset('upload/images/supporter/' . $supporter->image) : "" }}" alt="ảnh" style="width: 60px; height: 60px" srcset="">
                                        </td>
                                        <td>
                                            <div>{{ $supporter->fullname }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $supporter->tel }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $supporter->priority }}</div>
                                        </td>
                                        <td>
                                            <div>
                                                {{ $supporter->status ? 'Hiển thị' : 'Ẩn' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.supporter.edit', ['supporter' => $supporter]) }}" class="btn btn-primary mr-3">sửa</a>
                                                <form action="{{ route('admin.supporter.destroy',  ['supporter' => $supporter]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="box-trang">
                        {{$supporters->links('pagination::bootstrap-4')}}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
