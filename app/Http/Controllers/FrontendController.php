<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use App\Models\Customer;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Video;
use Illuminate\Pagination\LengthAwarePaginator;
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
        $menus1 = Menu::where("menu_type_id",2)
            ->where('parent_menu_id', 0)
            ->where('status', true)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->with(['products' => function($query) {
                $query->where('status', true)
                        ->where('is_hot', null)
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        ->with('product_size')
                        ->take(8);
            }])
            ->limit(8)->get();
        return view('frontend.index', compact('menus1'));
    }

    public function category(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $menu = Menu::where('slug', $slug)->first();
        $new = News::where('slug', $slug)->first();
        if($new) {
            return view('frontend.newsDetail')->with('new', $new)->with('menu', $menu);
        }
        else if($menu) {
            if($menu->menu_type_id == 2 || $menu->menu_type_id == 4) {
                $collection = Menu::where('status', true)
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        ->with(['products' => function($query) {
                            $query->where('status', true)
                                    ->where('is_hot', null)
                                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                    ->orderBy('created_at', 'DESC')
                                    ->with('product_size')
                                    ->get();
                        }])
                        ->where('id', $menu->id)
                        ->first();
                $data = $collection->products;
                $page = request("page") ?? 1;
                $perPage = 20;
                $offset = ($page * $perPage) - $perPage;
                $products = new LengthAwarePaginator(
                    array_slice($data->toArray(), $offset, $perPage, true),
                    count($data),
                    $perPage,
                    $page,
                    ['path' => request()->url(), 'query' => request()->query()]
                );
                if($menu->parent_menu_id == 0) {  // nếu là menu cha
                    $product_hots = Menu::where('status', true)
                                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                    ->with(['products' => function($query) {
                                        $query->where('status', true)
                                                ->where('is_hot', true)
                                                ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                                ->orderBy('created_at', 'DESC')
                                                ->with('product_size')
                                                ->limit(8);
                                    }])
                                    ->where('id', $menu->id)
                                    ->first();
                    if($request->sp_hot_trong_thang == "true") {
                        $product_all_hots = Menu::where('status', true)
                                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                    ->with(['products' => function($query) {
                                        $query->where('status', true)
                                                ->where('is_hot', true)
                                                ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                                ->orderBy('created_at', 'DESC')
                                                ->with('product_size')
                                                ->limit(20);
                                    }])
                                    ->where('id', $menu->id)
                                    ->first();
                        return view('frontend.category', compact('products', 'product_all_hots'))->with('menu', $menu);
                    }
                    return view('frontend.category', compact('products', 'product_hots'))->with('menu', $menu);
                }else {
                    $product_hots = Menu::where('status', true)
                                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                    ->with(['products' => function($query) {
                                        $query->where('status', true)
                                                ->where('is_hot', true)
                                                ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                                ->orderBy('created_at', 'DESC')
                                                ->with('product_size')
                                                ->limit(8);
                                    }])
                                    ->where('id', $menu->parent_menu_id)
                                    ->first();
                    $menu1 = Menu::find($menu->parent_menu_id);
                    // dd($menu, $menu1);
                    return view('frontend.category', compact('products', 'product_hots'))->with('menu1_hot', $menu1)->with('menu', $menu);
                }

            }else if($menu->menu_type_id != 2) {
                // dd($menu);
                $news = News::where('menu_id', $menu->id)
                                ->where('status', true)->paginate(20);
                if(isset($news)){
                    return view('frontend.news')->with('news', $news)->with('menu', $menu);
                }
            }
        }
        else if($slug == 'tat-ca-video.html'){
            $videoalls = Video::orderBY(DB::raw('ISNULL(videos.priority)'), 'ASC')
            ->orderBy('created_at', 'DESC')
            ->where('status', true)->paginate(20);
            return view('frontend.videos', compact('videoalls'));
        }
        else if($slug == 'thanks.html'){
            return view('frontend.thanks');
        }
        else if($product) {
            $image = 'image_' . $product->image_main;
            $image_main = $product->$image;
            $product_sizes = ProductSize::where('product_id', $product->id)->get();

            $customers = Customer::inRandomOrder()->limit(5)->get();
            return view('frontend.product', compact('product', 'customers', 'image_main'))->with('product_sizes', $product_sizes);
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
                            ->where('status', true)->orderBy('created_at', 'DESC')->paginate(20);
                    $menu = Menu::where('menu_type_id', 2)
                    ->limit(8)->get();
                    $products->appends(['keyword' => $keyword]);
                    return view('frontend.search')->with('products', $products);
    }
}
