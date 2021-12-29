<div>
    @foreach ($menus1 as $menu1)
        <div style="color: red; font-size: 20px; font-weight: bold">
            {{ $menu1->name }} {{ $menu1->priority }}
        </div>
        <?php $stt = 0;?>
        @foreach ($products as $key => $product)
            @if ($menu1->id == $product->parent_id)
                <?php $stt += 1; ?>
                <div style="color: black; font-size: 15px; font-weight: bold"><span><?php echo $stt; ?></span> &ensp;&ensp;&ensp;{{ $product->name }}&ensp;&ensp;&ensp;{{ $product->sell_price }}&ensp;&ensp;&ensp;{{ $product->sale_price }}</div>
            @endif
        @endforeach
    @endforeach
</div>

<div>
</div>
