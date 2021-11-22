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
        <label for="exampleInputEmail1">Tên Tin Tức Mới</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên Tin Tức" name="tenTinTuc">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Ảnh Tin Tức</label>
        <div id="exampleInputEmail1">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file"  placeholder="Tên" name="image">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mô Tả Ngắn</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Ngắn" name="moTaNgan">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mô Tả Chi Tiết</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="moTaChiTiet"></textarea>
          <script>
              CKEDITOR.replace( 'moTaChiTiet' );
          </script>
{{--        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Chi Tiết" name="moTaChiTiet">--}}
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Trạng Thái</label>
        <div>
        	<input type="checkbox"  name="trangThai" value="1"> Hiện Thị&emsp;&emsp;&emsp;
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
