<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\Product;
use App\Models\ShoppingCart;
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
        $carts = DB::table('bills')->join('bill_product', 'bill_product.bill_id', '=', 'bills.id')
            ->join('products', 'products.id', '=', 'bill_product.product_id')
            ->select('bills.*', 'bill_product.id AS id_bill', 'bill_product.quantity', 'products.name', 'products.sell_price')
            ->get();
        // dd($carts);
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
        $cart = DB::table('bills')->join('bill_product', 'bill_product.bill_id', '=', 'bills.id')
            ->join('products', 'products.id', '=', 'bill_product.product_id')
            ->select('bills.*', 'bill_product.id AS id_bill', 'bill_product.quantity', 'products.sell_price', 'products.name')
            ->where('bill_product.id', $id)->first();
        // dd($cart);
        return view('admin.cart.edit')->with('cart', $cart);
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
        $bill_product = BillProduct::find($id);
        $bill = Bill::find($bill_product->bill_id);
        // dd($bill);
        // dd($bill_product);
        $bill->status = $request->input('status');
        $bill->fullname = $request->input('fullname');
        $bill->description = $request->input('description');
        $bill->phone_number = $request->input('phone_number');
        $bill->email = $request->input('email');
        $bill->address = $request->input('address');
        $bill->update();

        $bill_product->sell_price = $request->input('sell_price');
        $bill_product->quantity = $request->input('quantity');
        $bill_product->update();

        return redirect()->route('admin.bill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }

    public function classify($type)
    {
        if($type == null) {
            return redirect()->route('admin.bill.index');
        }
        $carts = DB::table('bills')->join('bill_product', 'bill_product.bill_id', '=', 'bills.id')
            ->join('products', 'products.id', '=', 'bill_product.product_id')
            ->select('bills.*', 'bill_product.id AS id_bill', 'bill_product.quantity', 'products.name', 'products.sell_price')
            ->where('bills.status', $type)->get();
        // dd($carts);
        return view('admin.cart.classify')->with('carts', $carts);
    }

    public function billCreate(Request $request)
    {
        $bill = new Bill();
        $bill->fullname = $request->input('fullname');
        $bill->phone_number = $request->input('phone_number');
        $bill->address = $request->input('address');
        $bill->email = $request->input('fullname');
        $bill->description = $request->input('description');
        $bill->gender = $request->input('gender');
        $bill->status = 0;    // đơn vừa tạo là chưa thanh toán
        $bill->save();

        $carts = DB::table('shopping_carts')->join('products', 'products.id', '=', 'shopping_carts.product_id')->select('shopping_carts.*', 'products.sell_price', 'products.sale_price')->where('session_id', $request->input('session_id'))->get();

        foreach ($carts as $key => $cart) {
            $bill_product = new BillProduct();
            $bill_product->product_id = $cart->product_id;
            $bill_product->quantity = $cart->quantity;
            $bill_product->sell_price = $cart->sell_price;
            $bill_product->sale_price = $cart->sale_price;
            $bill_product->bill_id = $bill->id;
            $bill_product->save();
        }

        return redirect()->route('web');
    }
}
