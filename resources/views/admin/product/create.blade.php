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
        <label for="name">Tên Sản Phẩm</label>
        <input type="text" class="form-control" id="name" placeholder="Tên Sản Phẩm" name="name">
      </div>
      <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" class="form-control" id="title" placeholder="Tiêu Đề Sản Phẩm" name="title">
      </div>
      <div class="form-group">
        <label for="code">Mã Sản Phẩm</label>
        <input type="text" class="form-control" id="code" placeholder="Tiêu Đề Sản Phẩm" name="code">
      </div>
      <div class="form-group">
        <label for="image">Ảnh Sản Phẩm</label>
        <div id="image">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file" placeholder="Tên" name="image[]" multiple>
        </div>
      </div>
      <div class="form-group">
        <label for="size">Kích Thước</label>
        <input type="text" class="form-control" id="size" placeholder="Tiêu Đề Sản Phẩm" name="size">
      </div>
      <div class="form-group">
        <label for="guarantee">Bảo Hành</label>
        <input type="text" class="form-control" id="guarantee" placeholder="Tiêu Đề Sản Phẩm" name="guarantee">
      </div>
      <div class="form-group">
        <label for="">Tình Trạng</label>
        <input type="text" class="form-control" id="" placeholder="Tiêu Đề Sản Phẩm" name="">
      </div>
      <div class="form-group">
        <input type="checkbox" id="is_contact_product" name="is_contact_product" value="1">&emsp;
        <label for="is_contact_product">Là Sản Phẩm Liên Hệ? </label>
      </div>
      <div class="form-group">
        <label for="sell_price">Giá Gốc</label>
        <input type="text" class="form-control" id="sell_price" placeholder="Tiêu Đề Sản Phẩm" name="sell_price">
      </div>
      <div class="form-group">
        <label for="sale_price">Giá Sale</label>
        <input type="text" class="form-control" id="sale_price" placeholder="Tiêu Đề Sản Phẩm" name="sale_price">
      </div>
      <div class="form-group">
        <label for="">Loại Sản Phẩm</label>
        <div>
        	<input type="radio"  name="is_sale_in_month" value="1"> Khuyến MãiTháng&emsp;&emsp;&emsp;
            <input type="radio"  name="is_hot_product" value="1"> Hot Tháng
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
                    width: ['100%'], height: ['500px']
              });
          </script>
{{--        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Chi Tiết" name="content">--}}
      </div>
      <div class="form-group">
        <label for="specifications">Thông Số Kỹ Thuật</label>
          <textarea class="form-control" id="specifications" placeholder="Mô Tả Chi Tiết" name="specifications"></textarea>
          <script>
              CKEDITOR.replace( 'specifications' , {
                    width: ['100%'], height: ['500px']
              });
          </script>
{{--        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Chi Tiết" name="content">--}}
      </div>
      <div class="form-group">
        <label for="priority">Nơi hiện</label>
        <div class="d-flex">
          @foreach($menus2 as $menu2)
            {{$menu2->name}}&ensp;
            <select name="priority{{$menu2->id}}">
              <option value="0">- vị trí -</option>
              @for($i = 1; $i < 9; $i++)
                <option value="{{$i}}and{{$menu2->id}}">{{$i}}</option>
              @endfor
              <option value="9and{{$menu2->id}}">Mặc Định</option>
            </select>&emsp;&emsp;
          @endforeach
        </div>
      </div>
      <!-- <div class="form-group">
        <label for="priority">Vị trí</label>
        <input type="text" class="form-control" id="priority" placeholder="Ví Trị Của Sản Phẩm" name="priority">
        @if ($errors->any())
            <p>{{ $errors->first() }}</p>
        @endif
      </div> -->
      <div class="form-group">
        <label for="status">Trạng Thái</label>
        <div>
        	<input type="checkbox" id="status" name="status" value="1"> Hiển Thị&emsp;&emsp;&emsp;
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
