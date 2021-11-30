<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductMenu;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $products = DB::table('products')->join('product_menu', 'product_menu.product_id', '=', 'products.id')
                        ->select('products.*', 'product_menu.priority')
                        ->orderBy('product_menu.priority')
                        ->paginate(2);
        return view('admin.product.index', ['products' => $products])->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

        return view('admin.product.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_menus = ProductMenu::where('subcategory_id', $request->input('menu_id'))
            ->where('priority', $request->input('priority'))
            ->first();
        // dd($request);
        if ($product_menus != null) {
            return redirect()->back()->withErrors(['error' => 'Thứ tự ưu tiên đã tồn tại']);
        }

        $name = '';
        $temp = str_split($request->input('name'));
        foreach ($temp as $char) {
            if ($char == ' ') {
                $char = '-';
            }
            $name .= $char;
        }
        $imgData = [];
        if ($request->hasfile('image')) {
            foreach ($request->image as $key => $file) {
                if ($key == 0) {
                    $image_url = time() . $name . '.' . $file->extension();
                    $imgData[] = $image_url;
                } else {
                    $image_url = time() . $name . '(' . $key . ')' . '.' . $file->extension();
                    $imgData[] = $image_url;
                }
            }
        }
        $product = new Product();
        if ($imgData) {
            foreach ($imgData as $key => $image) {
                $name = 'image_' . ($key + 1);
                $product->$name = $image;
            }
        }
        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->code = $request->input('code');
        $product->size = $request->input('size');
        $product->guarantee = $request->input('guarantee');
        $product->sell_price = $request->input('sell_price');
        $product->sale_price = $request->input('sale_price');
        $product->status = $request->input('status');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->specifications = $request->input('specifications');
        $product->material = $request->input('material');
        $product->is_contact_product = $request->input('is_contact_product');
        $product->is_sale_in_month = $request->input('is_sale_in_month');
        $product->is_hot_product = $request->input('is_hot_product');

        $success = $product->save();

        if ($success && $request->image) {
            foreach ($request->image as $key => $file) {
                $file->move(public_path('upload/images/product'), $imgData[$key]);
            }
        }


        $product_menu = new ProductMenu();
        $product_menu->subcategory_id = $request->input('menu_id');
        $product_menu->product_id = $product->id;
        $product_menu->priority = $request->input('priority');
        $product_menu->save();

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_edit = Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
            ->where('products.id', $id)
            ->get(['products.id', 'products.name', 'products.code', 'products.title', 'products.description', 'products.content', 'products.specifications', 'products.sell_price', 'products.sale_price', 'products.size', 'products.sold_out', 'products.guarantee', 'products.status', 'products.image_1', 'products.image_2', 'products.image_3', 'products.is_contact_product', 'products.is_sale_in_month', 'products.is_hot_product', 'products.created_at', 'product_menu.priority',])->first();
        $menus = Menu::all();

        return view('admin.product.edit', ['product' => $product_edit], ['menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product_menus = ProductMenu::where('subcategory_id', $request->input('subcategory_id'))
            ->where('priority', $request->input('priority'))
            ->first();
        if ($product_menus && $product_menus->priority != $request->input('priority')) {
            return redirect()->back()->withErrors(['error' => 'Thứ tự ưu tiên đã tồn tại']);
        }
        $name = '';
        $temp = str_split($request->input('name'));
        foreach ($temp as $char) {
            if ($char == ' ') {
                $char = '-';
            }
            $name .= $char;
        }
        $imgData = [];
        if ($request->hasfile('image')) {
            foreach ($request->image as $key => $file) {
                if ($key == 0) {
                    if($product->image_1){
                        if (File::exists(public_path('upload/images/product/') . $product->image_1)) {
                            unlink(public_path('upload/images/product/'). $product->image_1);
                        }
                    }
                    $image_url = time() . $name . '.' . $file->extension();
                    $file->move(public_path('upload/images/product'), $image_url);
                    $imgData[] = $image_url;
                } else {
                    $name_temp = 'image_' . ($key + 1);
                    if($product->$name_temp){
                        if (File::exists(public_path('upload/images/product/') . $product->$name_temp)) {
                            unlink(public_path('upload/images/product/'). $product->$name_temp);
                        }
                    }
                    $image_url = time() . $name . '(' . $key . ')' . '.' . $file->extension();
                    $file->move(public_path('upload/images/product'),  $image_url);
                    $imgData[] = $image_url;
                }
            }
        }

        $product_update = Product::find($product->id);
        if ($imgData) {
            foreach ($imgData as $key => $image) {
                $name = 'image_' . ($key + 1);
                if($image){
                    $product_update->$name = $image;
                }else{
                    $product_update->$name = $product_update->$name;
                }
            }
        }
        $product_update->name = $request->input('name');
        $product_update->title = $request->input('title');
        $product_update->code = $request->input('code');
        $product_update->size = $request->input('size');
        $product_update->guarantee = $request->input('guarantee');
        $product_update->sell_price = $request->input('sell_price');
        $product_update->sale_price = $request->input('sale_price');
        $product_update->status = $request->input('status');
        $product_update->description = $request->input('description');
        $product_update->content = $request->input('content');
        $product_update->specifications = $request->input('specifications');
        $product_update->material = $request->input('material');
        $product_update->is_contact_product = $request->input('is_contact_product');
        $product_update->is_sale_in_month = $request->input('is_sale_in_month');
        $product_update->is_hot_product = $request->input('is_hot_product');
        $success = $product_update->update();
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image_1) {
            $image_url1 = public_path('upload/images/product/') . $product->image_1;
            if (File::exists($image_url1)) {
                unlink($image_url1);
            }
        }
        if ($product->image_2) {
            $image_url2 = public_path('upload/images/product/') . $product->image_2;
            if (File::exists($image_url2)) {
                unlink($image_url2);
            }
        }
        if ($product->image_2) {
            $image_url3 = public_path('upload/images/product/') . $product->image_3;
            if (File::exists($image_url3)) {
                unlink($image_url3);
            }
        }

        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
