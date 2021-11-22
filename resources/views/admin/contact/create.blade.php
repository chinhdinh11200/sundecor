@extends('admin.layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="left no-click">
                <h3 class="card-title"><a href="{{route('admin.contact.index')}}">Danh Sách Cần Liên Hệ</a></h3>
            </div>
            <div class="right">
                <h3 class="card-title"><a href="">Thêm KH Cần Liên Hệ</a></h3>
            </div>
        </div>

        <form role="form" method="post" action="{{route('admin.contact.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên Khách Hàng" name="hoTen">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số Điện Thoại</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Số Điện Thoại" name="soDienThoai">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="email" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nội Dung</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nội Dung" name="noiDung">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Trạng Thái</label>
                    <div>
                        <input type="radio"  name="trangThai" value="1"> Đang Xử Lý&emsp;
                        <input type="radio"  name="trangThai" value="2"> Chưa Xử Lý&emsp;
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
