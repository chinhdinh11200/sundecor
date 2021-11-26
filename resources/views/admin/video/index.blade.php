@extends('admin.layout.main')
@section('content')
    <a href="{{ route('admin.video.create') }}">Thêm mới</a>

    <table class="table table-border table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tiêu đề/ Link video</th>
                <th>Sắp xếp</th>
                <th>Trạng thái</th>
                <th>Edit</th>
            </tr>
            </thead>

            <tbody>
                @foreach ($videos as $key => $video)
                    <tr class="class">
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img src="{{ $video->image_url ?  asset('backend/images/video/'.$video->image_url) : "ccc" }}" alt="ảnh" style="width: 60px; height: 60px" srcset="">
                        </td>
                        <td>
                            <div>{{ $video->title }}</div>
                            <div>{{ $video->link }}</div>
                        </td>
                        <td>
                            <div>{{ $video->priority }}</div>
                        </td>
                        <td>
                            <div>
                                {{ $video->status ? 'Hiển thị' : 'Ẩn' }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.video.edit', ['video' => $video]) }}" class="btn btn-primary mr-3">sửa</a>
                                <form action="{{ route('admin.video.destroy',  ['video' => $video]) }}" method="POST">
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
