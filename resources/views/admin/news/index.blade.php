<!-- Navbar -->
@include('admin.layout.header', ['text' => 'news'])
<!-- /.navbar -->
@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.news.index')}}">Danh Sách Sản Phẩm</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.news.create')}}">Thêm Tin Tức</a></h3>
                        </div>
                    </div>

                    <!-- /.card-option -->
                    <form action="" class="card-option">
                        <select class="form-control" aria-label="Default select example" onchange="window.location=this.value">
                            <option selected>Open this select menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ route('admin.news.show', $menu->id) }}" >{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </form>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-3">Tên tin tức</th>
                                <th class="col-1">Ảnh</th>
                                <th class="col-3">Mô tả ngắn gọn</th>
                                <th class="col-4">Mô tả chi tiết</th>
                                <th class="col-1">Ưu tiên</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-2">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($news))
                                    @foreach ($news as $key => $new )
                                        <tr class="class">
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $new->name }}</td>
                                            <td><img style="width: 80px; object-fit: cover;" src="{{ asset('upload/images/news/' . $new->image) }}"></td>
                                            <td>{{ $new->description }}</td>
                                            <td>{{ $new->content }} ...&ensp;<a href="#">Xem thêm</a></td>
                                            <td>
                                                {{ $new->priority }}
                                            </td>
                                            <td>{{ $new->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td>
                                                <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-info">Sửa</a>
                                                <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>Menu rỗng</tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="box-trang">
                        {{$news->links('pagination::bootstrap-4')}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
