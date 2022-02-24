<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends CommonController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $carts = DB::table('bills')->join('bill_product', 'bill_product.bill_id', '=', 'bills.id')
        //     ->join('products', 'products.id', '=', 'bill_product.product_id')
        //     ->select('bills.*', 'products.name', 'bill_product.*')
        //     ->get();
        $carts = ShoppingCart::paginate(8);
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
        $carts = DB::table('shopping_carts')
            ->join('products', 'products.id', '=', 'shopping_carts.product_id')
            ->join('product_sizes', 'product_sizes.id', '=', 'product_size_id')
            ->select('products.name','products.image_1', 'shopping_carts.*', 'product_sizes.size', 'product_sizes.sale_price', 'product_sizes.sell_price')
            ->where('session_id', $request->input('session_id'))
            ->get();
        // $carts1 = ShoppingCart::where('session_id', $request->input('session_id'))->first();

        // dd($carts1, $carts1->products()->get());

        $cart_contacts = ShoppingCart::join('products', 'products.id', '=', 'shopping_carts.product_id')
            ->select('products.name','products.image_1', 'shopping_carts.*')
            ->where('session_id', $request->input('session_id'))
            ->where('product_size_id', null)->get();
        // dd($cart_contacts);
        $total = 0;
        foreach ($carts as $key => $cart) {
            $total += $cart->quantity * $cart->sale_price;
        }
        $cartQuantity = ShoppingCart::where('session_id', $request->input('session_id'))->count();
        return view('frontend.cart.index', compact('cart_contacts'))->with("carts", $carts)->with("total", $total)->with('cartQuantity', $cartQuantity);
    }

    public function cartUpdate(Request $request)
    {
        // dd($request);
        $cart_updates = $request->input("cartUpdate");

        foreach ($cart_updates as $key => $cart_update) {
            $cart = ShoppingCart::where('id', $cart_update["cart_id"])
                ->where('session_id', $request->input("session_id"))
                ->first();
            if ($cart) {
                if($cart_update["quantity"] == 0){
                    $cart->delete();
                }else{
                    $cart->quantity = $cart_update["quantity"];
                }
                $cart->update();
            }
        }

        return redirect()->route('cart.index');

        // $carts = DB::table('shopping_carts')
        //     ->join('products', 'products.id', '=', 'shopping_carts.product_id')
        //     ->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')
        //     ->select('products.*', 'shopping_carts.*', 'product_sizes.*')
        //     ->where('session_id', $request->input('session_id'))
        //     ->get();
        // $total = 0;
        // foreach ($carts as $key => $cart) {
        //     $total += $cart->quantity * $cart->sell_price;
        // }
        // $cartQuantity = ShoppingCart::where('session_id', $request->input('session_id'))->count();
        // return view('frontend.cart.index')->with("carts", $carts)->with("total", $total)->with('cartQuantity', $cartQuantity);
    }

    public function cartCreate(Request $request)
    {
        // dd($request);
        $product = Product::find($request->input('product_id'));

        if(!$product->is_contact_product) {
            if(!$request->has('product_size_id')){
                Alert::error("Lỗi", "Bạn chưa chọn kích cỡ sản phẩm");
                return redirect()->back();
            }
        }
        $shoppingCart = ShoppingCart::where('product_id', $request->input('product_id'))
            ->where('session_id', $request->input('session_id'))
            ->where('product_size_id', $request->input('product_size_id'))
            ->first();
        if ($shoppingCart) {
            $quantity = $shoppingCart->quantity  + 1;
            $shoppingCart->quantity = $quantity;        // thêm mới 1 sản phẩm bị trùng
            $shoppingCart->update();
        } else {
            $cart = new ShoppingCart();
            $cart->session_id = $request->input('session_id');
            $cart->product_id = $request->input('product_id');
            $cart->product_size_id = $request->input('product_size_id');
            $cart->quantity = 1;
            $cart->status = 0;
            $cart->save();
        }
        return redirect()->route('cart.index', ['session_id' => $request->input('session_id')]);
    }

    public function cartDelete(Request $request)
    {
        $cart = ShoppingCart::where('session_id', '=', $request->input('session_id'))
            ->where('id', '=', $request->input('id'))
            ->first();
        if ($cart) {
            $cart->delete();
        }

        return redirect()->route('cart.index', ['session_id' => $request->input('session_id')]);
        // $carts = DB::table('shopping_carts')
        //     ->join('products', 'products.id', '=', 'shopping_carts.product_id')
        //     ->select('products.*', 'shopping_carts.*')
        //     ->where('session_id', $request->input('session_id'))
        //     ->get();

        // $total = 0;
        // foreach ($carts as $key => $cart) {
        //     $total += $cart->quantity * $cart->sell_price;
        // }
        // $cartQuantity = ShoppingCart::count();
        // return "ccc";
        // return view('frontend.cart.index')->with("carts", $carts)->with("total", $total)->with("cartQuantity", $cartQuantity);
    }

    public function cartQuantity(Request $request) {
        $quantity = ShoppingCart::where('session_id', $request->input('session_id'))->count();
        return $quantity;
    }

    public function search(Request $request){
        $search = $request->input('s');
        if($search == ''){
            return redirect()->route('admin.cart.index');
        }else {
            $carts = Bill::where('fullname', 'like', '%'.$search.'%')
            ->orWhere('gender', 'like', '%'.$search.'%')
            ->orWhere('phone_number', 'like', '%'.$search.'%')
            ->orWhere('address', 'like', '%'.$search.'%')
            ->paginate(8);
            $carts->appends(['s' => $search]);
            return view('admin.cart.search')->with('carts', $carts);
        }
    }
}
