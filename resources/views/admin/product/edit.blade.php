@extends('admin.layout.main')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sửa {{$product->tenTinTuc}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.product.update',['product' => $product])}}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên Sản Phẩm" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tiêu Đề</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="title" value="{{ $product->title }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="code"
                  value="{{ $product->code }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
                  <div id="exampleInputEmail1">
                      <cite>Chọn Ảnh:&ensp;</cite><input type="file" placeholder="Tên" name="image[]" multiple>
                        @if ($product->image_1)
                            <img name style="width: 80px" src="{{ asset('upload/images/product/'. $product->image_1) }}" alt="">
                        @endif
                        @if ($product->image_2)
                            <img style="width: 80px" src="{{ asset('upload/images/product/'. $product->image_2) }}" alt="">
                        @endif
                        @if ($product->image_3)
                            <img style="width: 80px" src="{{ asset('upload/images/product/'. $product->image_3) }}" alt="">
                        @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kích Thước</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="size"
                  value="{{ $product->size }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bảo Hành</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="guarantee" value="{{ $product->guarantee }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tình Trạng</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name=""
                  value="{{ $product->sold_out }}">
                </div>
                <div class="form-group">
                  <input type="checkbox" id="exampleInputEmail1" name="is_contact_product" value="{{ $product->is_contact_product }}">&emsp;
                  <label for="exampleInputEmail1">Là Sản Phẩm Liên Hệ? </label>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Giá Gốc</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="sell_price" value="{{ $product->sell_price }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Giá Sale</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu Đề Sản Phẩm" name="sale_price" value="{{ $product->sale_product }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Loại Sản Phẩm</label>
                  <div>
                      <input type="radio"  name="is_sale_in_month" value="{{ $product->name }}"> Khuyến MãiTháng&emsp;&emsp;&emsp;
                      <input type="radio"  name="is_hot_product" value="{{ $product->name }}"> Hot Tháng
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mô Tả Ngắn</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Ngắn" name="description" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mô Tả Chi Tiết</label>
                    <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="content">
                        {{ $product->content }}
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'moTaChiTiet' );
                    </script>
          {{--        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Chi Tiết" name="content">--}}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Thông Số Kỹ Thuật</label>
                    <textarea class="form-control" id="moTaChiTiet" placeholder="Mô Tả Chi Tiết" name="specifications" >
                        {{ $product->specifications }}
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'moTaChiTiet' );
                    </script>
          {{--        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Chi Tiết" name="content">--}}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Vị trí</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ví Trị Của Sản Phẩm" name="priority" value="{{ $product->priority }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Trạng Thái</label>
                  <div>
                      <input type="checkbox"  name="status" value="1" {{ $product->status == 1 ? 'checked' : '' }}> Hiển Thị&emsp;&emsp;&emsp;
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
