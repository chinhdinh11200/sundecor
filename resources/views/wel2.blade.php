<div>
        @foreach ($products as $key => $product)
        <img src="{{ asset('upload/images/product/'. $product->image_1) }}" alt="" style="width: 100px; display: inline-block">
            <div style="color: black; font-size: 15px; font-weight: bold">{{ $key+1 }} &ensp;&ensp;&ensp;{{ $product->name }}&ensp;&ensp;&ensp;{{ $product->sell_price }}&ensp;&ensp;&ensp;{{ $product->sale_price }}</div>
            <div style="color: black; font-size: 15px; font-weight: bold">
                @if (!($product->product_size()->get()->isEmpty()))
                    {{ $product->product_size()->get()[0]->sell_price }}
                @endif
            </div>
            <div> ƯU tiên : {{ $product->priority }}</div>
            <div>-----------------------------------------</div>
        @endforeach
</div>

