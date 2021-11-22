@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.news.index')}}">Danh Sách Tin Tức</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.news.create')}}">Thêm Tin Tức</a></h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>TÊN LOẠI</th>
                                <th>ẢNH TIN TỨC</th>
                                <th>MÔ TẢ NGẮN</th>
                                <th>MÔ TẢ CHI TIẾT</th>
                                <th>TRẠNG THÁI</th>
                                <th>EDIT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($biendata as $key => $bien)
                                <tr class="loai-{{$bien->id}} {{$bien->trangThai!=1?'trangThaiAn':''}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$bien->tenTinTuc}}</td>
                                    <td><img style="width: 150px;" src="/{{$bien->image}}"></td>
                                    <td>{{$bien->moTaNgan}}</td>
                                    <?php
                                    $moTaChiTiet=explode("\r\n", $bien->moTaChiTiet);
                                    ?>
                                    <td>{!!$moTaChiTiet[0]!!} ...&ensp;<a href="{{route('admin.news.edit',[$bien->id])}}">Xem thêm</a></td>
                                    <td>{{$bien->trangThai==1?'Hiện':'Ẩn'}}</td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
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
