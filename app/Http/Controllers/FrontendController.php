<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menutype;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use App\Http\Controllers\CommonController;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\DB;

class FrontendController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function demo()
    {
        return view('frontend.demo');
    }
    /**
     * Display a listing
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus1 = Menu::where('parent_menu_id', 0)->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->get();
        $products = DB::table('menus')->join('menus AS menus2', 'menus2.parent_menu_id', '=', 'menus.id')
            ->join('product_menu', 'product_menu.subcategory_id', '=', 'menus2.id')
            ->join('products', 'product_menu.product_id', '=', 'products.id')
            ->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')
            ->distinct()
            ->select('products.*', 'product_menu.priority', 'menus.id AS parent_id', 'product_sizes.sale_price', 'product_sizes.sell_price')
            ->where('product_menu.priority', '<>', 'NULL')
            ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
            ->get();
        $product_result = array();
        foreach ($menus1 as $key => $menu1) {
            $quantity = 0;
            foreach ($products as $key1 => $product) {
                if ($product->parent_id == $menu1->id) {
                    $check = 0;
                    foreach ($product_result as $key2 => $value) {
                        if ($product->name == $value->name && $product->parent_id == $value->parent_id) {
                            $check += 1;
                        }
                    }
                    if ($check == 0) {
                        $product_result[] = $product;
                        $quantity += 1;
                    }
                }
                if ($quantity == 8) {
                    break;
                }
            }
        }

        return view('frontend.index')->with('menus1', $menus1)->with('products', $product_result);
    }

    public function category($slug)
    {
        $menu2 = Menu::where('slug', $slug)->first();    // mai tiếp đi m
        $products = Product::join()
            ->where()->get();
        return view('frontend.category');
    }

    // public function product_detail()
    // {
    //     return view('frontend.product_detail');
    // }

    // public function detailproduct($id)
    // {
    //     $data[0] = SanPham::find($id);
    //     $data[1] = SanPham::where('idLoai',$data[0]->idLoai)->get();
    //     $data[2] = SanPham::where('idHang',$data[0]->idHang)->get();
    //     $data[3] = SanPham::all();
    //     $data[4] = KhoiLuong::all();
    //     return view('frontend.detailproduct',['biendata' => $data]);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ //

    //    ---------------------------------------- Sản Phẩm --------------------------------------------
    public function product($id)
    {
        // $data_array[0] = ThuongHieu::all();
        // $data_array[1] = DanhMuc::all();
        // $data_array[2] = SanPham::latest()->paginate(9);
        // $data_array[3] = KhoiLuong::all();
        // return view('frontend.product',['biendata_array'=>$data_array]);
        // $product = Product::find($id);

        $product = Product::where('slug', $id)
            ->first();

        $product_sizes = ProductSize::where('product_id', $product->id)->get();
        // dd($product);
        return view('frontend.product')->with('product', $product)->with('product_sizes', $product_sizes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNews($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
