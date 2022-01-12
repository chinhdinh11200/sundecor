<!-- Navbar -->
@include('admin.layout.header', ['text' => 'product'])
<!-- /.navbar -->
@extends('admin.layout.main')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <h3 class="card-title"><a href="{{route('admin.product.index')}}">Danh sách sản phẩm</a></h3>
                        </div>
                        <div class="right no-click">
                            <h3 class="card-title"><a href="{{route('admin.product.create')}}">Thêm sản phẩm</a></h3>
                        </div>
                    </div>

                    <!-- /.card-option -->
                    <form action="" class="card-option">
                        <select class="form-control" aria-label="Default select example" onchange="window.location=this.value">
                            <option selected>Open this select menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ route('admin.product.show', $menu->id) }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </form>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-1">Ảnh</th>
                                <th class="col-6">Tên</th>
                                <th class="col-2">Ngày up</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="loai-{{$product->id}} {{$product->status!=1?'trangThaiAn':''}}">
                                        <td><img style="width: 60px;" src="{{ asset('upload/images/product/'. $product->image_1)}}"></td>
                                        <td>
                                            <div style="margin: auto 0;">
                                                {{$product->name}}
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle; text-align: center">{{$product->created_at}}</td>
                                        <td style="vertical-align: middle; text-align: center"><?php echo (1==$product->status?"Hiện":""); ?></td>
                                        {{-- <!-- <td>{{$product->priority}}</td> --> --}}
                                        <td style="vertical-align: middle;">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info" style="margin: 0 10px 0 0">Sửa</a>
                                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" onClick="confirm('Xóa ko?')">Xóa</button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-trang">
                        {{$products->links('pagination::bootstrap-4')}}
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
