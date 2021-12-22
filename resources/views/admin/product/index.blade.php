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
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Giá gốc</th>
                                <th>Giá sale</th>
                                <th style="width: 70px;">Ngày up</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <!-- <th>vị trí</th> -->
                                <th style="width: 0;"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="loai-{{$product->id}} {{$product->status!=1?'trangThaiAn':''}}">
                                        <td>{{$product->name}}</td>
                                        <td><img style="width: 80px;" src="{{ asset('upload/images/product/'. $product->image_1)}}"></td>
                                        <td>{{$product->title}}</td>
                                        <td>{{number_format($product->sell_price, 0, '.' ,',')}}</td>
                                        <td>{{number_format($product->sale_price, 0, '.' ,',')}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td><?php echo (1==$product->status?"Hiện":""); ?></td>
                                        {{-- <!-- <td>{{$product->priority}}</td> --> --}}
                                        <td style="opacity: 1">
                                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info">Sửa</a>
                                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" onClick="confirm('Xóa ko?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-trang">
                        {{$products->links()}}
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
