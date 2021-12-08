@extends('admin.layout.main')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sửa {{$biendata->tenTinTuc}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.news.update',$biendata->id)}}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Tên Bài Viết</label>
                    <input type="text" value="{{$biendata->tenTinTuc}}" class="form-control" id="" placeholder="Tên" name="tenTinTuc">
                </div>
                <div class="form-group">
                    <label for="">Thay đổi ảnh</label><br>
                    <cite>Chọn Ảnh:&ensp;</cite><input type="file" name="image_new"><br><br>
                    <img style="width: 120px; height: 120px; object-fit: cover;" src="{{asset($biendata->image)}}">
                </div>
                <div class="form-group">
                    <label for="">Mô Tả Ngắn Bài Viết</label>
                    <input type="text" value="{{$biendata->moTaNgan}}" class="form-control" id="" placeholder="Tên" name="moTaNgan">
                </div>
                <div class="form-group">
                    <label for="">Mô Tả Chi Tiết Bài Viết</label>
                    <textarea style="height: 1200px;" class="form-control" placeholder="Nhập nội dung bài viết" name="moTaChiTiet">{!!$biendata->moTaChiTiet!!}</textarea>
                    <script>
                        CKEDITOR.replace( 'moTaChiTiet' , {
                            width: ['100%'], height: ['500px']
                        });
                    </script>
                </div>
                <div class="form-group">
                    <label for="" >Trạng Thái</label>
                    <div>
                        <input {{($biendata->trangThai==1) ? "checked" : ""}} type="checkbox"  name="trangThai" value="1"> Hiện Thị&emsp;&emsp;&emsp;
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
