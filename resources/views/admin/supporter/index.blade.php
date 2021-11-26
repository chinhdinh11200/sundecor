@extends('admin.layout.main')
@section('content')
    <a href="{{ route('admin.supporter.create') }}">Thêm mới</a>
    <table class="table table-border table-hover text-center">
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
                        <img src="{{ $supporter->image_url ?  asset('backend/images/supporter/'.$supporter->image_url) : "" }}" alt="ảnh" style="width: 60px; height: 60px" srcset="">
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

@endsection
