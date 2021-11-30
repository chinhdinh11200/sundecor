@extends('admin.layout.main')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="left no-click">
            <h3 class="card-title"><a href="{{route('admin.news.index')}}">Danh Sách Tin Tức</a></h3>
        </div>
        <div class="right">
            <h3 class="card-title"><a href="{{route('admin.news.create')}}">Thêm Tin Tức</a></h3>
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
      </div>
      <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" class="form-control" id="title" placeholder="Tiêu Đề Tin Tức" name="title">
      </div>
      <div class="form-group">
        <label for="keyword">Keyword</label>
        <input type="text" class="form-control" id="keyword" placeholder="Tiêu Đề Tin Tức" name="keyword">
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
              CKEDITOR.replace( 'content' );
          </script>
        </div>
      <div class="form-group">
        <label for="priority">Vị trí</label>
        <input type="text" class="form-control" id="priority" placeholder="Ví Trị Của Tin Tức" name="priority">
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
