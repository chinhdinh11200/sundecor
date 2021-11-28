@extends('admin.layout.main')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="left no-click">
            <h3 class="card-title"><a href="{{route('admin.product.index')}}">Danh Sách Sản Phẩm</a></h3>
        </div>
        <div class="right">
            <h3 class="card-title"><a href="{{route('admin.product.create')}}">Thêm Sản Phẩm</a></h3>
        </div>
    </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.product.store')}}">
  	@csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên Sản Phẩm</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên Sản Phẩm" name="name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tiêu Đề</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="title">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mã Sản Phẩm</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="code">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
        <div id="exampleInputEmail1">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file" placeholder="Tên" name="image[]" multiple>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Kích Thước</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="size">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Bảo Hành</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="guarantee">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tình Trạng</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="">
      </div>
      <div class="form-group">
        <input type="checkbox" id="exampleInputEmail1" name="is_contact_product" value="1">&emsp;
        <label for="exampleInputEmail1">Là Sản Phẩm Liên Hệ? </label>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Giá Gốc</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="sell_price">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Giá Sale</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="sale_price">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Loại Sản Phẩm</label>
        <div>
        	<input type="radio"  name="is_sale_in_month" value="1"> Khuyến MãiTháng&emsp;&emsp;&emsp;
            <input type="radio"  name="is_hot_product" value="1"> Hot Tháng
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mô Tả Ngắn</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Ngắn" name="description">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mô Tả Chi Tiết</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content"></textarea>
          <script>
              CKEDITOR.replace( 'moTaChiTiet' );
          </script>
{{--        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Chi Tiết" name="content">--}}
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Thông Số Kỹ Thuật</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="specifications"></textarea>
          <script>
              CKEDITOR.replace( 'moTaChiTiet' );
          </script>
{{--        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Chi Tiết" name="content">--}}
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Vị trí</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ví Trị Của Sản Phẩm" name="priority">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Trạng Thái</label>
        <div>
        	<input type="checkbox"  name="status" value="1"> Hiển Thị&emsp;&emsp;&emsp;
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
