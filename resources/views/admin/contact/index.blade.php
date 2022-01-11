<!-- Navbar -->
@include('admin.layout.header', ['text' => 'contact'])
<!-- /.navbar -->
@extends('admin.layout.main')
@section('content')
    <section class="content">
        <div class="row">
            <div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="">Danh Sách Cần Liên Hệ</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.contact.create')}}">Thêm KH Cần Liên Hệ</a></h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>TÊN KHÁCH HÀNG</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>EMAIL</th>
                                <th>NỘI DUNG</th>
                                <th>TRẠNG THÁI</th>
                                <th>EDIT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($biendata as $key => $bien)
                                <tr class="loai-{{$bien->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$bien->hoTen}}</td>
                                    <td>{{$bien->soDienThoai}}</td>
                                    <td>{{$bien->email}}</td>
                                    <td>{{$bien->noiDung}}</td>
                                    <td>
                                        @if($bien->trangThai==1){{"Đang xử lý"}}@endif
                                        @if($bien->trangThai==2){{"Chưa xử lý"}}@endif
                                        @if($bien->trangThai==3){{"Đã xử lý"}}@endif
                                        @if($bien->trangThai==4){{"Hủy xử lý"}}@endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.contact.edit',$bien->id)}}" class="fas fa-edit"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-trang">
                        {{$biendata->links()}}
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
