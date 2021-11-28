@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.product.index')}}">Danh Sách SẢN PHẨM</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.product.create')}}">Thêm SẢN PHẨM</a></h3>
                        </div>
                    </div>

                    <!-- /.card-option -->
                    <form action="" class="card-option">
                        <select class="form-control" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </form>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Giá gốc</th>
                                <th>Giá sale</th>
                                <th>Ngày up</th>
                                <th>Trạng thái</th>
                                <th>vị trí</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr class="loai-{{$product->id}} {{$product->status!=1?'trangThaiAn':''}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$product->name}}</td>
                                        <td><img style="width: 80px;" src="{{ asset('upload/images/product/'. $product->image_1)}}"></td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->sell_price}}</td>
                                        <td>{{$product->sale_price}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>{{$product->status}}</td>
                                        <td>{{$product->priority}}</td>
                                        <td style="opacity: 1">
                                            <a href="{{route('admin.product.edit',['product'=>$product])}}" class="btn btn-info">Sửa</a>
                                            <form action="{{ route('admin.product.destroy', ['product' => $product]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="box-trang">
                        {{$productdata->links()}}
                    </div> --}}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
