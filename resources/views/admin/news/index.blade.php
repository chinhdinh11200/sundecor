@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.product.index')}}">Danh Sách Tin Tức</a></h3>
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
                                <tr class="loai-{{$bien->id}} {{$bien->status!=1?'trangThaiAn':''}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$bien->name}}</td>
                                    <td><img  style="width: 100px;height: 100px;" src="{{ asset('backend/images/tin-tuc/'.$bien->image)}}"></td>
                                    <td>{{$bien->description}}</td>
                                    <?php
                                    $moTaChiTiet=explode("\r\n", $bien->content);
                                    ?>
                                    <td>{!!$moTaChiTiet[0]!!} ...&ensp;<a href="{{route('admin.news.edit',['news'=>$bien])}}">Xem thêm</a></td>
                                    <td>{{$bien->status==1?'Hiện':'Ẩn'}}</td>
                                    <td>
                                        <a href="{{route('admin.news.edit',['news'=>$bien])}}" class="btn btn-info">Sửa</a>
                                        <a href="{{route('admin.news.destroy',['news'=>$bien])}}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="box-trang">
                        {{-- {{$biendata->links()}} --}}
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
