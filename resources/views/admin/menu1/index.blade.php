@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.menu.index')}}">Danh sách</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.menu.create')}}">Thêm mới</a></h3>
                        </div>
                    </div>

                    <!-- /.card-option -->
                    <form action="" class="card-option">
                        <select class="form-control" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </form>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>TÊN LOẠI</th>
                                <th>ẢNH Sản Phẩm</th>
                                <th>MÔ TẢ NGẮN</th>
                                <th>MÔ TẢ CHI TIẾT</th>
                                <th>TRẠNG THÁI</th>
                                <th>EDIT</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <tr class="class">
                                    <td>1</td>
                                    <td>name</td>
                                    <td><img style="width: 150px;" src="https://longnv.name.vn/wp-content/uploads/2019/09/logo4-150x150.png"></td>
                                    <td>mô tả ngắn</td>
                                    <td>mô tả chi tiết ...&ensp;<a href="#">Xem thêm</a></td>
                                    <td>Hiện</td>
                                    <td>
                                        <a href="#" class="btn btn-info">Sửa</a>
                                        <a href="#" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="box-trang">
                        phân trang
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
