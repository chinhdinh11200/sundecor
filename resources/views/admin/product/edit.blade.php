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
                  <label for="name">Tên Sản Phẩm</label>
                  <input type="text" class="form-control" id="name" placeholder="Tên Sản Phẩm" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                  <label for="title">Tiêu Đề</label>
                  <input type="text" class="form-control" id="title" placeholder="Tiêu Đề Sản Phẩm" name="title" value="{{ $product->title }}">
                </div>
                <div class="form-group">
                  <label for="code">Mã Sản Phẩm</label>
                  <input type="text" class="form-control" id="code" placeholder="Tiêu Đề Sản Phẩm" name="code"
                  value="{{ $product->code }}">
                </div>
                <div class="form-group">
                  <label for="image">Ảnh Sản Phẩm</label>
                  <div id="image">
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
                  <label for="size">Kích Thước</label>
                  <input type="text" class="form-control" id="size" placeholder="" name="size"
                  value="{{ $product->size }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bảo Hành</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="guarantee" value="{{ $product->guarantee }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tình Trạng</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name=""
                  value="{{ $product->sold_out }}">
                </div>
                <div class="form-group">
                  <input type="checkbox" id="is_contact_product" name="is_contact_product" value="{{ $product->is_contact_product }}">&emsp;
                  <label for="is_contact_product">Là Sản Phẩm Liên Hệ? </label>
                </div>
                <div class="form-group">
                  <label for="sell_price">Giá Gốc</label>
                  <input type="text" class="form-control" id="sell_price" placeholder="" name="sell_price" value="{{ $product->sell_price }}">
                </div>
                <div class="form-group">
                  <label for="sale_price">Giá Sale</label>
                  <input type="text" class="form-control" id="sale_price" placeholder="" name="sale_price" value="{{ $product->sale_price }}">
                </div>
                <div class="form-group">
                  <label for="">Loại Sản Phẩm</label>
                  <div>
                      <input type="radio"  name="is_sale_in_month" value="{{ $product->name }}"> Khuyến MãiTháng&emsp;&emsp;&emsp;
                      <input type="radio"  name="is_hot_product" value="{{ $product->name }}"> Hot Tháng
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Mô Tả Ngắn</label>
                  <input type="text" class="form-control" id="description" placeholder="Mô Tả Ngắn" name="description" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                  <label for="content">Mô Tả Chi Tiết</label>
                    <textarea class="form-control" id="content" placeholder="Mô Tả Chi Tiết" name="content">
                        {{ $product->content }}
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'content' );
                    </script>
          {{--        <input type="text" class="form-control" id="content" placeholder="Mô Tả Chi Tiết" name="content">--}}
                </div>
                <div class="form-group">
                  <label for="specifications">Thông Số Kỹ Thuật</label>
                    <textarea class="form-control" id="specifications" placeholder="Mô Tả Chi Tiết" name="specifications" >
                        {{ $product->specifications }}
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'specifications' );
                    </script>
                </div>
                <div class="form-group">
                  <label for="priority">Vị trí</label>
                  <input type="text" class="form-control" id="priority" placeholder="Ví Trị Của Sản Phẩm" name="priority" value="{{ $product->priority }}">
                  @if ($errors->any())
                        <p>{{ $errors->first() }}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label for="status">Trạng Thái</label>
                  <div>
                      <input type="checkbox"  name="status" value="1" {{ $product->status == 1 ? 'checked' : '' }}> Hiển Thị&emsp;&emsp;&emsp;
                  </div>
                </div>
                <div class="form-group">
                  <label for="status">Trạng Thái</label>
                  <div>
                      <select name="subcategory_id" id="">
                          @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                          @endforeach
                      </select>
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
