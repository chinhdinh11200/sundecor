@extends('admin.layout.main')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            {{-- <h3 class="card-title">Sửa {{$product->name}}</h3> --}}
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="post" enctype="multipart/form-data" action="{{route('admin.product.update',['product' => $product->id])}}">
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
                        {{-- @if ($product->image_1)
                            <img name style="width: 80px" src="{{ asset('upload/images/product/'. $product->image_1) }}" alt="">
                        @endif
                        @if ($product->image_2)
                            <img style="width: 80px" src="{{ asset('upload/images/product/'. $product->image_2) }}" alt="">
                        @endif
                        @if ($product->image_3)
                            <img style="width: 80px" src="{{ asset('upload/images/product/'. $product->image_3) }}" alt="">
                        @endif --}}
                  </div>
                </div>
                <div class="form-group">
                    <input onchange="isContactProduct()" type="checkbox" id="is_contact_product" name="is_contact_product" {{ $product->is_contact_product == 1 ? "checked" : '' }} value="{{ $product->is_contact_product }}">&emsp;
                    <label for="is_contact_product">Là Sản Phẩm Liên Hệ? </label>
                  </div>
                <div class="form-group" >
                    <label for="size">Kích Thước </label> <br>
                    <div id="product_size">
                        @if (count($product_sizes) != 0)
                            @foreach ($product_sizes as $product_size)
                                <div style="margin-top: 10px">
                                    <input type="text" class="size" id="size" placeholder="Kích thước" name="size[]" style="margin-right: 10px" value="{{ $product_size->size }}">
                                    <input type="text" class="sell_price" id="sell_price" placeholder="Giá gốc" name="sell_price[]" style="margin-right: 10px; {{ $product->is_contact_product == 1 ? "display : none" : '' }}" value="{{ $product_size->sell_price }}">
                                    <input type="text" class="sale_price" id="sale_price" placeholder="Giá sale" name="sale_price[]" style="margin-right: 10px; {{ $product->is_contact_product == 1 ? "display : none" : '' }}" value="{{ $product_size->sale_price }}">
                                </div>
                            @endforeach
                        @else
                            <div>
                                <input type="text" id="size" placeholder="Kích thước" name="size[]" style="margin-right: 10px">
                                <input type="text" id="sell_price" class="sell_price" placeholder="Giá gốc" name="sell_price[]" style="margin-right: 10px">
                                <input type="text" id="sale_price" class="sale_price" placeholder="Giá sale" name="sale_price[]" style="margin-right: 10px">
                            </div>
                        @endif
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" style="margin-top: 5px" onclick="addProductSize()">+</button>
                    <button type="button" class="btn btn-primary" style="margin-top: 5px" onclick="subProductSize()">-</button>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bảo Hành</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="guarantee" value="{{ $product->guarantee }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tình Trạng</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="sold_out"
                  value="{{ $product->sold_out }}">
                </div>
                <div class="form-group">
                  <label for="">Loại Sản Phẩm</label>
                  <div>
                      <input type="radio"  name="is_sale_in_month" value="1" {{ $product->is_sale_in_month == 1 ? "checked" : ""}}> Khuyến MãiTháng&emsp;&emsp;&emsp;
                      <input type="radio"  name="is_hot_product" value="1" {{ $product->is_hot_product == 1 ? "checked" : ""}}> Hot Tháng
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Mô Tả Ngắn</label>
                  <input type="text" class="form-control" id="description" placeholder="Mô Tả Ngắn" name="description" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                  <label for="content">Mô Tả Chi Tiết</label>
                    <textarea class="form-control" id="content" name="content">
                        {{ $product->content }}
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'content' , {
                          width: ['100%'], height: ['500px']
                        });

                    </script>
                </div>
                <div class="form-group">
                  <label for="specifications">Thông Số Kỹ Thuật</label>
                    <textarea class="form-control" id="specifications" name="specifications" >
                        {{ $product->specifications }}
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'specifications' , {
                          width: ['100%'], height: ['500px']
                        });
                    </script>
                </div>

                <div class="form-group">
                    <label for="priority">Nơi hiện</label>
                    {{-- <div class="d-flex justify-content-between" style="flex-wrap: wrap"> --}}
                      @foreach ($menus1 as $menu1)
                        <div style="margin-top: 10px; font-weight: 600; text-transform: uppercase">{{ $menu1->name }}</div>
                        <div class="d-flex" style="flex-wrap: wrap">
                            @foreach($menus2 as $menu2)
                                @if ($menu1->id == $menu2->parent_id)
                                    <div
                                        style="width: calc(100% / 3);
                                        margin-bottom : 8px;
                                        padding: 0 10px"
                                    >
                                        <div>
                                            <div
                                                style="display: inline-block;
                                                width: calc(100% - 100px);
                                                white-space: nowrap;
                                                overflow: hidden !important;
                                                text-overflow: ellipsis;"
                                            >
                                                {{$menu2->name}}
                                            </div>
                                            <select name="priority{{$menu2->id}}">
                                                <option value="0">- vị trí -</option>
                                                @for($i = 1; $i <= 9; $i++)
                                                    <option value="{{$i}}and{{$menu2->id}}"
                                                        <?php
                                                            foreach ($product_menus as $product_menu) {
                                                                //echo $product_menu->subcategory_id.",";
                                                                if(($product_menu->priority == $i || ($product_menu->priority == null)) && ($product_menu->subcategory_id == $menu2->id) && ($product_menu->product_id == $product->id)){
                                                                    echo "selected";
                                                                    break;
                                                                }
                                                            }
                                                        ?>
                                                    >{{$i == 9 ? "Mặc định" : $i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                      @endforeach
                    {{-- </div> --}}
                </div>

                <div class="form-group">
                  <label for="status">Trạng Thái</label>
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
            sell_price.setAttribute('class', `sell_price`)
            sell_price.setAttribute('type', 'text')
            sell_price.setAttribute('placeholder', 'Giá gốc')
            sell_price.style.marginRight = "13px";
            const sale_price = document.createElement("input");
            sale_price.setAttribute('name', `sale_price[]`)
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
    </script>
@endsection
