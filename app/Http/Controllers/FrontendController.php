<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use App\Http\Controllers\CommonController;
use App\Models\Customer;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ShoppingCart;
use App\Models\Video;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $menus1 = Menu::where('parent_menu_id', 0)
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        ->where('menu_type_id', 2)
                        ->where('status', true)
                        ->limit(8)->get();
        $products = DB::table('menus')->join('menus AS menus2', 'menus2.parent_menu_id', '=', 'menus.id')
            ->join('product_menu', 'product_menu.subcategory_id', '=', 'menus2.id')
            ->join('products', 'product_menu.product_id', '=', 'products.id')
            ->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')
            ->where('products.status', true)
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

        $product_sales = DB::table('products')->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')
                            ->join('product_menu', 'product_menu.product_id', '=', 'products.id')
                            ->where('products.status', true)
                            ->select('products.*', 'product_sizes.*', 'product_menu.priority')
                            ->where('is_sale_in_month', true)
                            ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'))
                            ->get();
        $product_result_sale = array();
        foreach ($product_sales as $key1 => $product) {
            $check = 0;
            foreach ($product_result_sale as $key2 => $value) {
                if($product->name == $value->name) {     // trùng tên khác ưu tiên mà cùng menu
                    $check += 1;
                }
            }
            if($check == 0) {
                $product_result_sale[] = $product;
            }
        }

        return view('frontend.index', compact('product_result_sale'))->with('menus1', $menus1)->with('products', $product_result);
    }

    public function category($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $menu = Menu::where('slug', $slug)->first();
        $new = News::where('slug', $slug)->first();
        if($menu) {
            if($menu->menu_type_id == 2) {
                if($menu->parent_menu_id == 0){
                    $products = Product::join('product_menu', 'product_menu.product_id', 'products.id')
                                        ->join('menus', 'menus.id', 'product_menu.subcategory_id')
                                        ->where('products.status', true)
                                        ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
                                        ->select('products.*')
                                        ->where('menus.parent_menu_id', $menu->id)
                                        ->paginate(20);
                    $product_hots = Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
                                        ->join('menus', 'menus.id', '=', 'product_menu.subcategory_id')
                                        ->where('products.status', true)
                                        ->select('products.*', 'product_menu.priority')
                                        ->where('is_hot_product', true)
                                        ->where('menus.parent_menu_id', $menu->id)
                                        ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'))
                                        ->get();
                    $product_menu_hots = array();
                    foreach ($product_hots as $key1 => $product) {
                        $check = 0;
                        foreach ($product_menu_hots as $key2 => $value) {
                            if($product->name == $value->name) {     // trùng tên khác ưu tiên mà cùng menu
                                $check += 1;
                            }
                        }
                        if($check == 0) {
                            $product_menu_hots[] = $product;
                        }
                    }
                }else {
                    $products = Product::join('product_menu', 'product_menu.product_id', 'products.id')
                                        ->where('products.status', true)
                                        ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
                                        ->select('products.*')
                                        ->where('product_menu.subcategory_id', $menu->id)->paginate(20);

                    $product_hots = Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
                    ->join('menus', 'menus.id', '=', 'product_menu.subcategory_id')
                    ->where('products.status', true)
                    ->select('products.*', 'product_menu.priority')
                    ->where('is_hot_product', true)
                    ->where('menus.parent_menu_id', $menu->id)
                    ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'))
                    ->get();
                    $product_menu_hots = array();
                    foreach ($product_hots as $key1 => $product) {
                        $check = 0;
                        foreach ($product_menu_hots as $key2 => $value) {
                            if($product->name == $value->name) {     // trùng tên khác ưu tiên mà cùng menu
                                $check += 1;
                            }
                        }
                        if($check == 0) {
                            $product_menu_hots[] = $product;
                        }
                    }
                }
                return view('frontend.category', compact('products', 'product_menu_hots'))->with('menu', $menu);
            }else if($menu->menu_type_id != 2) {
                $news = News::where('menu_id', $menu->id)
                                ->where('status', true)->paginate(20);
                if(isset($news)){
                    return view('frontend.news')->with('news', $news)->with('menu', $menu);
                }
            }
            else {
                return redirect()->route('web');
            }
        }
        else if($new) {
            if($new){
                return view('frontend.newsDetail')->with('new', $new)->with('menu', $menu);
            }
        }
        else if($slug == 'tat-ca-video.html'){
            $videoalls = Video::paginate(20);
            return view('frontend.videos', compact('videoalls'));
        }
        else if($product) {
            $product_sizes = ProductSize::where('product_id', $product->id)->get();

            $products = Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
                    ->where('products.status', true)
                    ->where('product_menu.subcategory_id', $product->product_menu()->get()[0]->subcategory_id)
                    ->paginate(20);
            $customers = Customer::inRandomOrder()->limit(5)->get();
            // dd($customers);
            return view('frontend.product', compact('products', 'customers'))->with('product', $product)->with('product_sizes', $product_sizes);
        }
        else {
            return redirect()->route('web');
        }
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
    public function product($id, Request $request)
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

    public function search(Request $request) {
        $keyword = Str::slug($request->keyword);
        if(empty($keyword)) {
            return redirect()->route('web');
        }
        $products = Product::where('slug', 'like', '%'. $keyword . '%')
                            ->where('status', true)->paginate(20);

                    $menu = Menu::where('menu_type_id', 2)
                    ->limit(8)->get();
                    $products->appends(['keyword' => $keyword]);
                    return view('frontend.search')->with('products', $products)->with('menu', $menu);
    }

    // public function tinTuc() {
    //     $keyword = Str::slug($request->keyword);
    //     $products = Product::where('slug', 'like', '%'. $keyword . '%')->paginate(20);

    //     return view('frontend.news')->with('products', $products)->with('menu', $menu);
    // }
}
