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
                            <h3 class="card-title"><a href="{{route('admin.news.index')}}">Danh sách tin tức</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.news.create')}}">Thêm tin tức</a></h3>
                        </div>
                    </div>

                    <!-- /.card-option -->
                    <form action="" class="card-option">
                        <select class="form-control" aria-label="Default select example" onchange="window.location=this.value">
                            <option selected>Open this select menu</option>
                            @foreach ($menus1 as $menu1)
                                <option value="{{ route('admin.news.show', $menu1->id) }}" >{{ $menu1->name }}</option>
                                @foreach ($menus2 as $menu2)
                                    @if ($menu2->parent_menu_id == $menu1->id)
                                        <option value="{{ route('admin.news.show', $menu2->id) }}" >{{ $menu2->name }}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </form>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-2">Tên tin tức</th>
                                <th class="col-1">Ảnh</th>
                                <th class="col-3">Mô tả ngắn gọn</th>
                                {{-- <th class="col-4">Mô tả chi tiết</th> --}}
                                <th class="col-1">Ưu tiên</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-2">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($news))
                                    @foreach ($news as $key => $new )
                                        <tr class="class">
                                            <td style="vertical-align: middle; text-align: center">{{ $key + 1}}</td>
                                            <td>{{ $new->name }}</td>
                                            <td style="vertical-align: middle; text-align: center"><img style="width: 60px; object-fit: cover;" src="{{ asset('upload/images/news/' . $new->image) }}"></td>
                                            <td>{{ $new->description }}</td>
                                            {{-- <td>{{ $new->content }} ...&ensp;<a href="#">Xem thêm</a></td> --}}
                                            <td style="vertical-align: middle; text-align: center">
                                                {{ $new->priority }}
                                            </td>
                                            <td style="vertical-align: middle; text-align: center">{{ $new->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td style="vertical-align: middle; text-align: center">
                                                <div class="d-flex justify-content-center" style="max-height: 38px">
                                                    <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-primary mr-3">Sửa</a>
                                                    @if($new->menu_id == 1)
                                                    @else
                                                        <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    @endif
                                                </div>
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
