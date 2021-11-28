@extends('admin.layout.main')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="left no-click">
            <h3 class="card-title"><a href="{{route('admin.menu1.index')}}">Danh Sách</a></h3>
        </div>
        <div class="right">
            <h3 class="card-title"><a href="{{route('admin.menu1.create')}}">Thêm</a></h3>
        </div>
    </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.menu1.store')}}">
  	@csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên" name="name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề" name="title">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Keyword</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Keyword" name="keyword">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Vị trí</label>
        <select type="text" class="form-control" id="exampleInputEmail1" name="priority">
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
        <label for="exampleInputEmail1">Loại menu</label>
        <select type="text" class="form-control" id="exampleInputEmail1" name="menu_type_id">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Ảnh</label>
        <div id="exampleInputEmail1">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file"  name="images">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mô Tả Ngắn</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Ngắn" name="description">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nội dung trên</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content_1"></textarea>
          <script>
              CKEDITOR.replace( 'content_1' );
          </script>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nội dung dưới</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content_2"></textarea>
          <script>
              CKEDITOR.replace( 'content_2' );
          </script>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Trạng Thái</label>
        <div>
        	<input type="checkbox"  name="status" value="1"> Hiện Thị&emsp;&emsp;&emsp;
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