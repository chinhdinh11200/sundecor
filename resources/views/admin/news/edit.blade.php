@extends('admin.layout.main')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sửa {{$news->name}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.news.update',['news' => $news])}}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Tên Bài Viết</label>
                    <input type="text" value="{{$news->name}}" class="form-control" id="" placeholder="Tên" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề Tin Tức</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên Tin Tức" value="{{$news->title}}" name="title">
                  </div>
                <div class="form-group">
                    <label for="">Thay đổi ảnh</label><br>
                    <cite>Chọn Ảnh:&ensp;</cite><input type="file" name="image"><br><br>
                    <img style="width: 150px;" src="{{asset($news->image)}}">
                </div>
                <div class="form-group">
                    <label for="">Mô Tả Ngắn Bài Viết</label>
                    <input type="text" value="{{$news->description}}" class="form-control" id="" placeholder="Tên" name="description">
                </div>
                <div class="form-group">
                    <label for="">Mô Tả Chi Tiết Bài Viết</label>
                    <textarea style="height: 1200px;" class="form-control" placeholder="Nhập nội dung bài viết" name="content">{!!$news->content!!}</textarea>
                    <script>
                        CKEDITOR.replace( 'moTaChiTiet' );
                    </script>
                </div>
                <div class="form-group">
                    <label for="" >Trạng Thái</label>
                    <div>
                        <input {{($news->status==1) ? "checked" : ""}} type="checkbox"  name="status" value="1"> Hiện Thị&emsp;&emsp;&emsp;
                    </div>
                </div>
                <div class="form-group">
                    <label for="typemenu">Thuộc menu</label>
                    <div>
                      <select name="menu_id" id="typemenu">
                          @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
