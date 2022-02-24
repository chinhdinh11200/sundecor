@extends('admin.layout.main')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="left no-click">
            <h3 class="card-title"><a href="{{route('admin.news.index')}}">Danh sách tin tức</a></h3>
        </div>
        <div class="right">
            <h3 class="card-title"><a href="{{route('admin.news.create')}}">Thêm tin tức</a></h3>
        </div>
    </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.news.store')}}">
  	@csrf
    <div class="card-body">
      <div class="form-group">
        <label for="name">Tên Tin Tức</label>
        <input type="text" class="form-control" id="name" placeholder="Tên Tin Tức" name="name">
        @if($errors->has('name'))
        <p style="color: red">{{ $errors->first('name') }}</p>
      @endif
      </div>
      <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" class="form-control" id="title" placeholder="Tiêu Đề Tin Tức" name="title">
        @if($errors->has('title'))
        <p style="color: red">{{ $errors->first('title') }}</p>
      @endif
      </div>
      <div class="form-group">
        <label for="keyword">Keyword</label>
        <input type="text" class="form-control" id="keyword" placeholder="Từ Khóa Tin Tức" name="keyword">
        @if($errors->has('keyword'))
        <p style="color: red">{{ $errors->first('keyword') }}</p>
      @endif
      </div>
      <div class="form-group">
        <label for="image">Ảnh Tin Tức</label>
        <div id="image">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file"  placeholder="Tên" name="image">
        </div>
      </div>
      <div class="form-group">
        <label for="description">Mô Tả Ngắn</label>
        <input type="text" class="form-control" id="description" placeholder="Mô Tả Ngắn" name="description">
      </div>
      <div class="form-group">
        <label for="content">Mô Tả Chi Tiết</label>
          <textarea class="form-control" id="content" placeholder="Mô Tả Chi Tiết" name="content"></textarea>
          <script>
              CKEDITOR.replace( 'content' , {
                    filebrowserBrowseUrl: '/backend/ckfinder/ckfinder.html',
                    filebrowserUploadUrl: '/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                });
          </script>
        </div>
      <div class="form-group">
        <label for="priority">Vị trí</label>
        <select type="text" class="form-control" id="priority" name="priority">
            <option value="{{ null }}">Chọn vị trí</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
      </div>
      <div class="form-group">
        <label for="status">Trạng Thái</label>
        <div>
        	<input type="checkbox"  name="status" value="1"> Hiện Thị&emsp;&emsp;&emsp;
        </div>
      </div>
      <div class="form-group">
          <label for="typemenu">Thuộc menu</label>
          <div>
            <select name="menu_id" id="typemenu">
                @foreach ($menus as $menu)
                  <option value="{{ $menu->id }}">{{ $menu->name }}</option>
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
