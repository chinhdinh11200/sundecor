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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Sắp xếp</th>
                                    <th>Trạng thái</th>
                                    <th>Edit</th>
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
                </div>

            </div>
        </div>
    </section>
@endsection
