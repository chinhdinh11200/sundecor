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

  <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.menu1.update', ['menu1' => $data->id])}}">
  	@csrf
    @method('put')
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên" name="name" value="{{ $data->name }}">
        @if($errors->has('name'))
      <p style="color: red">{{ $errors->first('name') }}</p>
    @endif
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề" name="title" value="{{ $data->title }}">
        @if($errors->has('title'))
      <p style="color: red">{{ $errors->first('title') }}</p>
    @endif
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Keyword</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Keyword" name="keyword" value="{{ $data->keyword }}">
        @if($errors->has('keyword'))
      <p style="color: red">{{ $errors->first('keyword') }}</p>
    @endif
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Vị trí</label>
        <select type="text" class="form-control" id="exampleInputEmail1" name="priority">
            <option value selected>Mặc Định</option>
          @for($i = 1; $i < 9; $i++)
            <option value="{{$i}}" <?php echo ($i==$data->priority ? "selected" : ""); ?> >{{$i}}</option>
          @endfor
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Loại menu</label>
        <select type="text" class="form-control" id="menu_type_id" name="menu_type_id">
          <option value >--- Chọn loại menu ---</option>
          <?php foreach($menutype as $mt): ?>
              <option value="{{$mt->id}}" <?php echo ($mt->id==$data->menu_type_id?"selected":""); ?>>{{$mt->name}}</option>
          <?php endforeach ?>
        </select>
        @if($errors->has('menu_type_id'))
            <p style="color: red">{{ $errors->first('menu_type_id') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Ảnh</label>
        <div id="exampleInputEmail1">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file"  name="images">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mô Tả Ngắn</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Ngắn" name="description" value="{{ $data->description }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nội dung trên</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content_1" required>{{ $data->content_1 }}</textarea>
          <script>
              CKEDITOR.replace( 'content_1' , {
                    width: ['100%'], height: ['500px']
              });
          </script>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nội dung dưới</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content_2" required>{{ $data->content_2 }}</textarea>
          <script>
              CKEDITOR.replace( 'content_2' , {
                    width: ['100%'], height: ['500px']
              });
          </script>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Trạng Thái</label>
        <div>
        	<input type="checkbox" <?php echo ($data->status==1?"checked":""); ?> name="status" value="1"> Hiện Thị&emsp;&emsp;&emsp;
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
