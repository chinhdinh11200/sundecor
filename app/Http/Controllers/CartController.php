<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends CommonController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = DB::table('bills')->join('bill_product', 'bill_product.bill_id', '=', 'bills.id')
                                    ->join('products', 'products.id', '=', 'bill_product.product_id')
                                    ->select('bills.*', 'products.name', 'bill_product.*')
                                    ->get();

        return view('admin.cart.index')->with('carts', $carts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = DB::table('bills')->join('bill_product', 'bill_product.bill_id', '=', 'bills.id')
                                    ->join('products', 'products.id', '=', 'bill_product.product_id')
                                    ->select('bills.*', 'products.name', 'bill_product.*')
                                    ->where('bill_product.id', $id)
                                    ->first();
        return view('admin.cart.edit', ['cart' => $cart]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cart(Request $request)
    {
        // dd($request);
        $carts = DB::table('shopping_carts')
            ->join('products', 'products.id', '=', 'shopping_carts.product_id')
            ->select('products.*', 'shopping_carts.*')
            // ->where('session_id', "085ebce9-b690-469d-8325-8707abd35766")
            ->where('session_id', $request->input('session_id'))
            ->get();

        // dd($carts);
        $total = 0;
        foreach ($carts as $key => $cart) {
            $total += $cart->quantity * $cart->sell_price;
        }
        return view('frontend.cart.index')->with("carts", $carts)->with("total", $total);
    }

    public function cartUpdate(Request $request)
    {
        dd($request);
        $cart_updates = $request->input("cartUpdate");

        foreach ($cart_updates as $key => $cart_update) {
            $cart = ShoppingCart::where('id', $cart_update["cart_id"])
                ->where('session_id', $request->input("session_id"))
                ->first();
            if ($cart) {
                $cart->quantity = $cart_update["quantity"];
                $cart->update();
            }
        }

        $carts = DB::table('shopping_carts')
            ->join('products', 'products.id', '=', 'shopping_carts.product_id')
            ->select('products.*', 'shopping_carts.*')
            ->where('session_id', $request->input('session_id'))
            ->get();
        $total = 0;
        foreach ($carts as $key => $cart) {
            $total += $cart->quantity * $cart->sell_price;
        }
        return view('frontend.cart.index')->with("carts", $carts)->with("total", $total);
    }

    public function cartCreate(Request $request)
    {
        dd($request);
        $shoppingCart = ShoppingCart::where('product_id', $request->input('product_id'))
            ->where('session_id', $request->input('session_id'))
            ->first();
        if ($shoppingCart) {
            $quantity = $shoppingCart->quantity  + 1;
            $shoppingCart->quantity = $quantity;        // thêm mới 1 sản phẩm bị trùng
            $shoppingCart->update();
        } else {
            $cart = new ShoppingCart();
            $cart->session_id = $request->input('session_id');
            $cart->product_id = $request->input('product_id');
            $cart->quantity = 1;
            $cart->status = 0;
            $cart->save();
        }
        $carts = DB::table('shopping_carts')
            ->join('products', 'products.id', '=', 'shopping_carts.product_id')
            ->select('products.*', 'shopping_carts.*')
            ->where('session_id', $request->input('session_id'))
            ->get();

        $total = 0;
        foreach ($carts as $key => $cart) {
            $total += $cart->quantity * $cart->sell_price;
        }
        return view('frontend.cart.index')->with("carts", $carts)->with("total", $total);
    }
}
