<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Rules\Required;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = DB::table('bills')->orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')->paginate(8);
        $products = Product::all();
        return view('admin.cart.index')->with('carts', $carts)->with('products', $products);
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
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show($bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = DB::table('bills')->where('id', $id)->first();
        $product_buys = Product::join('bill_product', 'bill_product.product_id', '=', 'products.id')
                                ->select('bill_product.*', 'products.name')
                                ->where('bill_product.bill_id', $id)->get();
                                // dd($product_buys);
        return view('admin.cart.edit', compact('product_buys'))->with('cart', $cart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->status = $request->input('status');
        // $bill->fullname = $request->input('fullname');
        // $bill->description = $request->input('description');
        // $bill->phone_number = $request->input('phone_number');
        // $bill->email = $request->input('email');
        // $bill->address = $request->input('address');
        $bill->update();

        return redirect()->route('admin.bill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Bill::find($id);
        $cart->delete();
        return redirect()->route('admin.bill.index');
    }

    public function classify($type)
    {
        $carts = DB::table('bills')
            ->orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')
            ->where('bills.status', $type)->paginate(8);
        return view('admin.cart.classify')->with('carts', $carts)->with('type', $type);
    }

    public function billCreate(Request $request)
    {
        $request->validate([
            'fullname' => new Required,
            'phone_number' => new Required,
            'address' => new Required,
            'email' => new Required,
        ]);
        $carts = DB::table('shopping_carts')
                    ->join('product_sizes', 'product_sizes.id', '=', 'shopping_carts.product_size_id')
                    ->select('shopping_carts.*', 'product_sizes.sell_price', 'product_sizes.sale_price')
                    ->where('session_id', $request->input('session_id'))
                    ->get();
        $cart_contacts = ShoppingCart::join('products', 'products.id', '=', 'shopping_carts.product_id')
                    ->select('products.name','products.image_1', 'shopping_carts.*')
                    ->where('session_id', $request->input('session_id'))
                    ->where('product_size_id', null)->get();
                    // dd($cart_contacts);
        $bill = new Bill();
        $bill->fullname = $request->input('fullname');
        $bill->phone_number = $request->input('phone_number');
        $bill->address = $request->input('address');
        $bill->email = $request->input('fullname');
        $bill->description = $request->input('description');
        $bill->gender = $request->input('gender');
        $bill->status = 0;    // đơn vừa tạo là chưa thanh toán
        $bill->save();

        foreach ($carts as $key => $cart) {
            $bill_product = new BillProduct();
            $bill_product->product_id = $cart->product_id;
            $bill_product->quantity = $cart->quantity;
            $bill_product->sell_price = $cart->sell_price ? $cart->sell_price : null;
            $bill_product->sale_price = $cart->sale_price ? $cart->sale_price : null;
            $bill_product->bill_id = $bill->id;
            $bill_product->save();
        }

        foreach ($cart_contacts as $key => $cart) {
            $bill_product = new BillProduct();
            $bill_product->product_id = $cart->product_id;
            $bill_product->quantity = $cart->quantity;
            $bill_product->sell_price = $cart->sell_price ? $cart->sell_price : null;
            $bill_product->sale_price = $cart->sale_price ? $cart->sale_price : null;
            $bill_product->bill_id = $bill->id;
            $bill_product->save();
        }

        return redirect()->route('web');
    }

    public function search(Request $request){
        $search = $request->input('s');
        if($search == ''){
            return redirect()->route('admin.cart.index');
        }else {
            $carts = DB::table('bills')->join('bill_product', 'bill_product.bill_id', '=', 'bills.id')
                        ->join('products', 'products.id', '=', 'bill_product.product_id')
                        ->select('bills.*', 'products.name', 'bill_product.id AS id_bill', 'bill_product.quantity', 'products.name', 'bill_product.sell_price')
                        ->where('fullname', 'like', '%'.$search.'%')
                        ->paginate(8);
            $carts->appends(['s' => $search]);
            return view('admin.cart.search')->with('carts', $carts);
        }
    }
}
