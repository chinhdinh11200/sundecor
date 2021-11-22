@extends('admin.layout.main')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sửa {{$biendata->tenLoai}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="post" action="{{route('admin.category.update',$biendata->id)}}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Tên Loại Sản Phẩm</label>
                    <input type="text" value="{{$biendata->tenLoai}}" class="form-control" id="" placeholder="Tên" name="tenLoai">
                </div>
                <div class="form-group">
                    <label for="">Vị Trí</label>
                    <input type="number" value="{{$biendata->viTri}}" class="form-control" id="" placeholder="Vị trí" name="viTri">
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
