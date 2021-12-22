@extends('admin.layout.main')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="left no-click">
            <h3 class="card-title"><a href="{{route('admin.menu2.index')}}">Danh Sách</a></h3>
        </div>
        <div class="right">
            <h3 class="card-title"><a href="{{route('admin.menu2.create')}}">Thêm</a></h3>
        </div>
    </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.menu2.update', $menu->id)}}">
  	@csrf
    @method('PUT')
    <input type="hidden" name="parent_menu_id" value="{{ $menu->parent_menu_id }}">
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên" name="name" value="{{ $menu->name }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề" name="title" value="{{ $menu->title }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Keyword</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Keyword" name="keyword" value="{{ $menu->keyword }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Vị trí</label>
        <select type="text" class="form-control" id="exampleInputEmail1" name="priority">
          <option value="null" >---Chọn vị trí---</option>
          <option value="1" {{ $menu->priority == 1 ? "selected" : '' }}>1</option>
          <option value="2" {{ $menu->priority == 2 ? "selected" : '' }}>2</option>
          <option value="3" {{ $menu->priority == 3 ? "selected" : '' }}>3</option>
          <option value="4" {{ $menu->priority == 4 ? "selected" : '' }}>4</option>
          <option value="5" {{ $menu->priority == 5 ? "selected" : '' }}>5</option>
          <option value="6" {{ $menu->priority == 6 ? "selected" : '' }}>6</option>
          <option value="7" {{ $menu->priority == 7 ? "selected" : '' }}>7</option>
          <option value="8" {{ $menu->priority == 8 ? "selected" : '' }}>8</option>
        </select>
      </div>
      <?php
        $check_mt[1]=0; $check_mt[2]=0; $check_mt[3]=0; $check_mt[4]=0; $i=1;
        foreach($menus as $m){
          if($m->menu_type_id==1){
            $check_mt[1]=1;
          }
          if($m->menu_type_id==2){
            $check_mt[2]=2;
          }
          if($m->menu_type_id==3){
            $check_mt[3]=3;
          }
          if($m->menu_type_id==4){
            $check_mt[4]=4;
          }
        }
      ?>
      <div class="form-group">
        <label for="exampleInputEmail1">Loại menu</label>
        <select type="text" class="form-control" id="menu_type_id" name="menu_type_id">
          <option value="null" >---Chọn loại menu---</option>
            <?php foreach($menutype as $mt): ?>
                <option value="{{$mt->id}}"
                    <?php
                    if($mt->id==$check_mt[$i]){
                        echo "selected";
                    }
                    else {
                        echo "disabled";
                    }
                    ?> >{{$mt->name}}</option>
                    <?php $i++; ?>
            <?php endforeach ?>
        </select>
      </div>
      <div class="form-group" id="option_parrent"></div>
      <script>
        $(function() {
            console.log("test44");
        //   $('#menu_type_id').change(function() {
                var menu_type_id = $('#menu_type_id').val();
                $.ajax({
                url: '{{route("admin.menu_type_id")}}/?id='+menu_type_id+'&parent_menu_id='+$('[name=parent_menu_id]').attr('value'),
                method: "GET",
                success:function(data){
                    $('#option_parrent').html(data);
                }
                });
        //   });
        });
      </script>

      <div class="form-group">
        <label for="exampleInputEmail1">Ảnh</label>
        <div id="exampleInputEmail1">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file"  name="images">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Mô Tả Ngắn</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Ngắn" name="description" value="{{ $menu->description }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nội dung trên</label>
          <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content_1">{{ $menu->content_1 }}</textarea>
          <script>
              CKEDITOR.replace( 'content_1' , {
                    width: ['100%'], height: ['500px']
              });
          </script>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nội dung dưới</label>
        <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content_2">{{ $menu->content_2 }}</textarea>
        <script>
            CKEDITOR.replace( 'content_2' , {
                width: ['100%'], height: ['500px']
            });
        </script>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Trạng Thái</label>
        <div>
        	<input type="checkbox"  name="status" value="1" {{ $menu->status == 1 ? "checked" : "" }}> Hiện Thị&emsp;&emsp;&emsp;
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
