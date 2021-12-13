<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillProduct;
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
        //
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
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
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

    public function billCreate(Request $request){
        $bill = new Bill();
        $bill->fullname = $request->input('fullname');
        $bill->phone_number = $request->input('phone_number');
        $bill->address = $request->input('address');
        $bill->email = $request->input('fullname');
        $bill->description = $request->input('description');
        $bill->gender = $request->input('gender');
        $bill->status = false;    // đơn vừa tạo là chưa thanh toán
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
