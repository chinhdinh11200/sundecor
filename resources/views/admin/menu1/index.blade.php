@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.menu1.index')}}">Danh sách</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.menu1.create')}}">Thêm mới</a></h3>
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
                                <th style="width: 120px;">ẢNH Sản Phẩm</th>
                                <th>TIÊU ĐỀ</th>
                                <th>LOẠI MENU</th>
                                <th style="width: 70px;">VỊ TRÍ</th>
                                <th style="width: 100px;">TRẠNG THÁI</th>
                                <th style="width: 0;">EDIT</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($datas))
                                    @foreach ($datas as $key => $data )
                                        <tr class="class">
                                            <td><img style="width: 120px; height: 120px; object-fit: cover;" src="../public/{{ $data->images }}"></td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->menuType->name }}</td>
                                            <td style="text-align: center;">{{ $data->priority }}</td>
                                            <td style="text-align: center;">{{ $data->status == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info" style="margin-bottom: 10px;">Sửa</a>
                                                <a href="#" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>Menu rỗng</tr>
                                @endif
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
