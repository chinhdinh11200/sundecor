@extends('admin.layout.main')
@section('content')
<div class="card">

    <div class="card-header">
        <div class="left no-click">
            <h3 class="card-title"><a href="{{route('admin.product.index')}}">Danh sách sản phẩm</a></h3>
        </div>
        <div class="right">
            <h3 class="card-title"><a href="{{route('admin.product.create')}}">Thêm sản phẩm</a></h3>
        </div>
    </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.product.store')}}">
  	@csrf
    <div class="card-body">
      <div class="form-group">
        <label for="name">Tên Sản Phẩm</label>
        <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm" name="name" value="{{ old('name') }}">
        @if($errors->has('name'))
            <p style="color: red">{{ $errors->first('name') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" class="form-control" id="title" placeholder="Tiêu Đề sản phẩm" name="title" value="{{ old('title') }}">
        @if($errors->has('title'))
            <p style="color: red">{{ $errors->first('title') }}</p>
        @endif
      </div>
      <div class="form-group">
        <label for="keyword">Từ khóa</label>
        <input type="text" class="form-control" id="keyword" placeholder="Từ Khóa" name="keyword" value="{{ old('keyword') }}">
        @if($errors->has('keyword'))
            <p style="color: red">{{ $errors->first('keyword') }}</p>
        @endif
    </div>
      <div class="form-group">
        <label for="code">Mã Sản Phẩm</label>
        <input type="text" class="form-control" id="code" placeholder="Mã sản phẩm" name="code" value="{{ old('code') }}">
        @if($errors->has('code'))
            <p style="color: red">{{ $errors->first('code') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="material">Chất liệu</label>
        <input type="text" class="form-control" id="material" placeholder="Chất Liệu Sản Phẩm" name="material"
        value="{{ old('material') }}">
        @if($errors->has('material'))
            <p style="color: red">{{ $errors->first('material') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label for="color">Màu sắc</label>
        <input type="text" class="form-control" id="color" placeholder="Màu Sắc Sản Phẩm" name="color"
        value="{{ old('color') }}">
        @if($errors->has('color'))
            <p style="color: red">{{ $errors->first('color') }}</p>
        @endif
    </div>
      <div class="form-group">
        <label for="image">Ảnh Sản Phẩm</label>
        <div id="image">
        	<cite>Chọn Ảnh:&ensp;</cite><input type="file" name="image[]" multiple value="{{ old('image[]') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="guarantee">Bảo Hành</label>
        <input type="text" class="form-control" id="guarantee" placeholder="Bảo hành sản phẩm" name="guarantee" value="{{ old('guarantee') }}">
      </div>
      <div class="form-group">
        <label for="">Tình Trạng</label>
        <input type="text" class="form-control" id="sold_out" placeholder="Trạng thái sản phẩm" name="sold_out" value="{{ old('sold_out') }}">
      </div>
      <div class="form-group">
        <input onchange="isContactProduct()" type="checkbox" id="is_contact_product" name="is_contact_product" value="1" {{ old('is_contact_product') == 1 ? "checked" : '' }}>&emsp;
        <label for="is_contact_product">Là Sản Phẩm Liên Hệ? </label>
      </div>
      <div class="form-group" >
        <label for="size">Kích Thước </label> <br>
        <div id="product_size">
            <div>
                <input type="text" id="size" placeholder="Kích thước" name="size[]" style="margin-right: 10px">
                <input type="text" id="sell_price" class="sell_price" placeholder="Giá gốc" name="sell_price[]" style="margin-right: 10px" onchange="format_price(this)">
                <input type="text" id="sale_price" class="sale_price" placeholder="Giá sale" name="sale_price[]" style="margin-right: 10px" onchange="format_price(this)">
            </div>
        </div>

        @if($errors->has('size'))
            <p style="color: red">{{ $errors->first('size') }}</p>
        @endif
        @if($errors->has('sell_price'))
            <p style="color: red">{{ $errors->first('sell_price') }}</p>
        @endif
        @if($errors->has('sale_price'))
            <p style="color: red">{{ $errors->first('sale_price') }}</p>
        @endif
        <br>
        <button type="button" class="btn btn-primary" style="margin-top: 5px" onclick="addProductSize()">+</button>
        <button type="button" class="btn btn-primary" style="margin-top: 5px" onclick="subProductSize()">-</button>
      </div>

      <div class="form-group">
        <label for="">Loại Sản Phẩm</label>
        <div>
        	<input type="checkbox" id="is_sale_in_month" name="is_sale_in_month"  value="1" {{ old('is_sale_in_month') == 1 ? "checked" : '' }}> Khuyến MãiTháng&emsp;&emsp;&emsp;
            <input type="checkbox" id="is_hot_product" name="is_hot_product"  value="1" {{ old('is_hot_product') == 1 ? "checked" : '' }}> Hot Tháng
        </div>
      </div>
      <div class="form-group">
        <label for="description">Mô Tả Ngắn</label>
        <input type="text" class="form-control" id="description" placeholder="Mô Tả Ngắn" name="description" value="{{ old('description') }}">
      </div>
      @if($errors->has('description'))
      <p style="color: red">{{ $errors->first('description') }}</p>
    @endif
      <div class="form-group">
        <label for="content">Mô Tả Chi Tiết</label>
          <textarea class="form-control" id="content" placeholder="Mô Tả Chi Tiết" name="content" value="{{ old('content') }}"></textarea>
          @if($errors->has('content'))
          <p style="color: red">{{ $errors->first('content') }}</p>
      @endif
          <script>
              CKEDITOR.replace( 'content' , {
                    filebrowserBrowseUrl: '/backend/ckfinder/ckfinder.html',
                    filebrowserUploadUrl: '/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                });
          </script>
        </div>
      <div class="form-group">
        <label for="specifications">Thông Số Kỹ Thuật</label>
          <textarea class="form-control" id="specifications" placeholder="Mô Tả Chi Tiết" name="specifications" value="{{ old('specifications') }}"></textarea>
          <script>
              CKEDITOR.replace( 'specifications' , {
                    filebrowserBrowseUrl: '/backend/ckfinder/ckfinder.html',
                    filebrowserUploadUrl: '/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                });
          </script>
        </div>

      <div class="form-group">
        <label for="priority">Nơi hiện</label>
        {{-- <div class="d-flex justify-content-between" style="flex-wrap: wrap"> --}}
        @foreach ($menus1 as $menu1)
            <div class="d-flex" style="flex-wrap: wrap">
                <div
                    style="width: calc(100% / 3);
                    margin-bottom : 8px;
                    padding: 0 10px"
                >
                    <div style="
                            display: flex;
                            align-items: center;"
                    >
                        <div
                            style="display: inline-block;
                            width: calc(100% - 100px);
                            white-space: nowrap;
                            overflow: hidden !important;
                            text-overflow: ellipsis;
                            font-weight: 600"
                        >
                            {{$menu1->name}}
                        </div>
                        <input style="width : 50px; margin-right: 5px;" type="number" name="priority_hot{{ $menu1->id }}" min="1" placeholder="hot">
                        <input style="width : 50px" type="number" name="priority{{ $menu1->id }}" min="1">
                    </div>
                </div>
            </div>
            <div class="d-flex" style="flex-wrap: wrap">
                @foreach($menus2 as $menu2)
                    @if ($menu1->id == $menu2->parent_id)
                    <div
                        style="width: calc(100% / 3);
                        margin-bottom : 8px;
                        padding: 0 10px"
                    >
                        <div style="
                                display: flex;
                                align-items: center;"
                        >
                            <div
                                style="display: inline-block;
                                width: calc(100% - 100px);
                                white-space: nowrap;
                                overflow: hidden !important;
                                text-overflow: ellipsis;"
                            >
                                {{$menu2->name}}
                            </div>
                            <input style="width : 50px; margin-right: 5px;" type="number" name="priority_hot{{ $menu2->id }}" min="1" placeholder="hot">
                            <input style="width : 50px" type="number" name="priority{{ $menu2->id }}" min="1">
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
      <div class="form-group">
        <label for="status">Trạng Thái</label>
        <div>
        	<input type="checkbox" id="status" name="status" value="1" {{ old('status') == 1 ? "checked" : '' }}> Hiển Thị&emsp;&emsp;&emsp;
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

<script>
    function addProductSize() {
        const productSize = document.getElementById('product_size');
        const size = document.createElement("input");
        size.setAttribute('name', `size[]`)
        size.setAttribute('type', 'text')
        size.setAttribute('placeholder', 'Kích thước')
        size.style.marginRight = "13px";
        const sell_price = document.createElement("input");
        sell_price.setAttribute('name', `sell_price[]`)
        sell_price.setAttribute('onchange', `format_price(this)`)
        sell_price.setAttribute('class', `sell_price`)
        sell_price.setAttribute('type', 'text')
        sell_price.setAttribute('placeholder', 'Giá gốc')
        sell_price.style.marginRight = "13px";
        const sale_price = document.createElement("input");
        sale_price.setAttribute('name', `sale_price[]`)
        sale_price.setAttribute('onchange', `format_price(this)`)
        sale_price.setAttribute('class', `sale_price`)
        sale_price.setAttribute('type', 'text')
        sale_price.setAttribute('placeholder', 'Giá sale')
        const div = document.createElement('div');
        div.style.marginTop = "10px"
        div.appendChild(size);
        div.appendChild(sell_price);
        div.appendChild(sale_price);
        productSize.appendChild(div);

        const contactProduct = document.getElementById('is_contact_product')
        if(contactProduct.checked){
            const sell = document.querySelectorAll('.sell_price');
            const sale = document.querySelectorAll('.sale_price');
            for (let i = 0; i < sell.length; i++) {
                sell[i].style.display = "none";
                sale[i].style.display = "none";
            }
            console.log(sale, sell);
        }else {
            const sell = document.querySelectorAll('.sell_price');
            const sale = document.querySelectorAll('.sale_price');
            for (let i = 0; i < sell.length; i++) {
                sell[i].style.display = "inline-block";
                sale[i].style.display = "inline-block";
            }
        }
    }

    function isContactProduct() {
        const contactProduct = document.getElementById('is_contact_product')
        if(contactProduct.checked){
            const sell = document.querySelectorAll('.sell_price');
            const sale = document.querySelectorAll('.sale_price');
            for (let i = 0; i < sell.length; i++) {
                sell[i].style.display = "none";
                sale[i].style.display = "none";
            }
            console.log(sale, sell);
        }else {
            const sell = document.querySelectorAll('.sell_price');
            const sale = document.querySelectorAll('.sale_price');
            for (let i = 0; i < sell.length; i++) {
                sell[i].style.display = "inline-block";
                sale[i].style.display = "inline-block";
            }
        }
    }

    function subProductSize() {
        const productSizes = document.querySelectorAll('#product_size div');
        const lastChild = productSizes.length - 1;
        if(lastChild != 0){
            console.log(productSizes[lastChild]);
            productSizes[lastChild].remove();
        }
    }

    function format_price(e) {
        const value = e.value.split(',').join('');
        // console.log("🚀 ~ file: edit.blade.php ~ line 309 ~ format_price ~ price", value)

        var formatter = new Intl.NumberFormat('en-US', {
            style: undefined,
            currency: 'VND',
        });
        const price = formatter.format(value);
        e.value = price;
    }
</script>
@endsection
