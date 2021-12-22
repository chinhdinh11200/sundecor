@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title">
                                <a href="{{ route('admin.video.index') }}">Danh sách video</a>
                            </h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title">
                                <a href="{{ route('admin.video.create') }}">Thêm video</a>
                            </h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-2">Ảnh</th>
                                    <th class="col-6">Tiêu đề/ Link video</th>
                                    <th class="col-1">Sắp xếp</th>
                                    <th class="col-1">Trạng thái</th>
                                    <th class="col-1">Edit</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($videos as $key => $video)
                                    <tr class="class">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ $video->image ?  asset('upload/images/video/'. $video->image) : "ccc" }}" alt="ảnh" style="width: 60px; height: 60px" srcset="">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
