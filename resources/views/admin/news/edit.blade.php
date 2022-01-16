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
                    <label for="keyword">Keyword</label>
                    <input type="text" class="form-control" id="keyword" placeholder="Tiêu Đề Tin Tức" name="keyword">
                </div>
                <div class="form-group">
                    <label for="">Thay đổi ảnh</label><br>
                    <cite>Chọn Ảnh:&ensp;</cite><input type="file" name="image"><br>
                </div>
                <div class="form-group">
                    <label for="">Mô Tả Ngắn Bài Viết</label>
                    <input type="text" value="{{$news->description}}" class="form-control" id="" placeholder="Tên" name="description">
                </div>
                <div class="form-group">
                    <label for="">Mô Tả Chi Tiết Bài Viết</label>
                    <textarea style="height: 1200px;" id="moTaChiTiet"  class="form-control" placeholder="Nhập nội dung bài viết" name="content">{!!$news->content!!}</textarea>
                    <script>
                        CKEDITOR.replace( 'moTaChiTiet' , {
                            width: ['100%'], height: ['500px']
                        });
                    </script>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Vị trí</label>
                    <select type="text" class="form-control" id="priority" name="priority">
                        <option value="{{ null }}">Chọn vị trí</option>
                        <option value="1" {{ $news->priority == 1 ? "selected" : "" }}>1</option>
                        <option value="2" {{ $news->priority == 2 ? "selected" : "" }}>2</option>
                        <option value="3" {{ $news->priority == 3 ? "selected" : "" }}>3</option>
                        <option value="4" {{ $news->priority == 4 ? "selected" : "" }}>4</option>
                        <option value="5" {{ $news->priority == 5 ? "selected" : "" }}>5</option>
                        <option value="6" {{ $news->priority == 6 ? "selected" : "" }}>6</option>
                        <option value="7" {{ $news->priority == 7 ? "selected" : "" }}>7</option>
                        <option value="8" {{ $news->priority == 8 ? "selected" : "" }}>8</option>
                    </select>
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
                      <select name="menu_id" id="typemenu" class="form-control">
                          @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{ $menu->id == $news->menu_id ? "selected" : '' }}>{{ $menu->title }}</option>
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
