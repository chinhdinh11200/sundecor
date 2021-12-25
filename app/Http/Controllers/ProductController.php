<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductMenu;
use App\Models\ProductSize;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
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
        $products = DB::table('products')
                        // ->join('product_menu', 'product_menu.product_id', '=', 'products.id')
                        // ->select('products.*', 'product_menu.priority')
                        // ->orderBy('product_menu.priority')
                        ->paginate(8);
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
        $menus2 = Menu::where("parent_menu_id","<>",0)
                        ->where("menu_type_id",2)
                        ->where("status",1)
                        ->limit(8)
                        ->get();

        return view('admin.product.create', ['menus' => $menus, 'menus2' => $menus2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->input('sell_price')[0]);
        // dd($request);
        $menus2 = Menu::where("parent_menu_id","<>",0)
                        ->where("menu_type_id",2)
                        ->where("status",1)
                        ->limit(8)
                        ->get();
        // $product_menus = ProductMenu::where('subcategory_id', $request->input('menu_id'))
        //     ->where('priority', $request->input('priority'))
        //     ->first();
        // if ($product_menus != null) {
        //     return redirect()->back()->withErrors(['error' => 'Thứ tự ưu tiên đã tồn tại']);
        // }

        $imgData = [];
        if ($request->hasfile('image')) {
            // dd($request);
            foreach ($request->image as $key => $file) {
                if ($key == 0) {
                    $image_url = time() . '.' . $file->extension();
                    $imgData[] = $image_url;
                } else {
                    $image_url = time() . '(' . $key . ')' . '.' . $file->extension();
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

        $product_exist = Product::where('name', $request->input('name'))
                                    ->orWhere('code', $request->input('code'))
                                    ->first();
        if($product_exist) {
            // Alert::error('Error', 'Sản phẩm đã tồn tại');
            return redirect()->back()->withInput($request->input());
        }
        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->code = $request->input('code');
        $product->guarantee = $request->input('guarantee');
        $product->status = $request->input('status');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->specifications = $request->input('specifications');
        $product->is_contact_product = $request->input('is_contact_product');
        $product->is_sale_in_month = $request->input('is_sale_in_month');
        $product->is_hot_product = $request->input('is_hot_product');
        $product->sold_out = $request->input('sold_out');

        $success = $product->save();

        if($request->image) {
            foreach ($request->image as $key => $file) {
                $file->move(public_path('upload/images/product'), $imgData[$key]);
            }
        }
        // dd($request->input('sell_price'));
        foreach ($request->input('size') as $key => $value) {
            $product_size = new ProductSize();
            $product_size->product_id = $product->id;
            $product_size->size = $value;
            $product_size->sell_price = $request->input('sell_price')[$key];
            $product_size->sale_price = $request->input('sale_price')[$key];
            $product_size->save();
        };

        foreach($menus2 as $menu2):
            if($request->input('priority'.$menu2->id) != 0){
                $priority = explode("and", $request->input('priority'.$menu2->id))[0];
                $subcategory_id = explode("and", $request->input('priority'.$menu2->id))[1];
                $priority_exist = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $subcategory_id)
                                            ->first();

                if($priority_exist) {
                    $priority_exist->priority = null;
                    $priority_exist->update();
                }
                $product_menu = new ProductMenu();
                $product_menu->product_id = $product->id;
                $product_menu->subcategory_id = explode("and", $request->input('priority'.$menu2->id))[1];
                $product_menu->priority = explode("and", $request->input('priority'.$menu2->id))[0];
                if(explode("and", $request->input('priority'.$menu2->id))[0] == 9){
                    $product_menu->priority = null;
                }

                $product_menu->save();
            }
        endforeach;

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
            ->get(['products.id', 'products.name', 'products.code', 'products.title', 'products.description', 'products.content', 'products.specifications', 'products.sell_price', 'products.sale_price', 'products.size', 'products.sold_out', 'products.guarantee', 'products.status', 'products.image_1', 'products.image_2', 'products.image_3', 'products.is_contact_product', 'products.is_sale_in_month', 'products.is_hot_product', 'products.created_at', 'product_menu.priority',])
            ->first();
        if($product_edit == null){  // update product don't have menu2
            $product_edit = Product::find($id);
        }
            $menus2 = Menu::where("parent_menu_id","<>",0)
            ->where("menu_type_id",2)
            ->where("status",1)
            ->limit(8)
            ->get();
        $product_menus = ProductMenu::all();
        $product_sizes = ProductSize::where('product_id', $id)->get();
        // dd($product_sizes);
        return view('admin.product.edit', ['product' => $product_edit], ['menus2' => $menus2])->with( 'product_menus', $product_menus)->with( 'product_sizes', $product_sizes);
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
        // dd($request);
        $product_update = Product::find($product->id);
        $menus2 = Menu::where("parent_menu_id","<>",0)
                        ->where("menu_type_id",2)
                        ->where("status",1)
                        ->get();
        $product_menus = ProductMenu::where('subcategory_id', $request->input('subcategory_id'))
            ->where('priority', $request->input('priority'))
            ->first();
        if ($product_menus && $product_menus->priority != $request->input('priority')) {
            return redirect()->back()->withErrors(['error' => 'Thứ tự ưu tiên đã tồn tại']);
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
                    $image_url = time() . '.' . $file->extension();
                    $file->move(public_path('upload/images/product'), $image_url);
                    $imgData[] = $image_url;
                } else {
                    $name_temp = 'image_' . ($key + 1);
                    if($product->$name_temp){
                        if (File::exists(public_path('upload/images/product/') . $product->$name_temp)) {
                            unlink(public_path('upload/images/product/'). $product->$name_temp);
                        }
                    }
                    $image_url = time() . '(' . $key . ')' . '.' . $file->extension();
                    $file->move(public_path('upload/images/product'),  $image_url);
                    $imgData[] = $image_url;
                }
            }
            $numofImage = count($imgData);
            for ($i=$numofImage + 1; $i < 4; $i++) {
                $name_img = 'image_'.$i;
                if($product_update->$name_img){
                    if (File::exists(public_path('upload/images/product/') . $product_update->$name_img)) {
                        unlink(public_path('upload/images/product/'). $product_update->$name_img);
                    }
                }
                $product_update->$name_img = null;
            }
        }

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
        $product_update->guarantee = $request->input('guarantee');
        $product_update->status = $request->input('status');
        $product_update->description = $request->input('description');
        $product_update->content = $request->input('content');
        $product_update->specifications = $request->input('specifications');
        $product_update->material = $request->input('material');
        $product_update->is_contact_product = $request->input('is_contact_product');
        $product_update->is_sale_in_month = $request->input('is_sale_in_month');
        $product_update->is_hot_product = $request->input('is_hot_product');
        $product_update->sold_out = $request->input('sold_out');
        $product_update->update();
        $product_sizes = ProductSize::where('product_id', $product->id)->get();
        foreach ($product_sizes as $key => $product_size) {
            $product_size->product_id = $product->id;
            $product_size->size = $request->input('size')[$key];
            $product_size->sell_price = $request->input('sell_price')[$key];
            $product_size->sale_price = $request->input('sale_price')[$key];
            $product_size->update();
        };

        foreach($menus2 as $menu2):
            if($request->input('priority'.$menu2->id) != 0){
                // tìm product_menu hiện tại cần update
                $priority = explode("and", $request->input('priority'.$menu2->id))[0];
                $subcategory_id = explode("and", $request->input('priority'.$menu2->id))[1];
                $product_menu_update = ProductMenu::where('product_id', $product_update->id)
                                                    ->where('subcategory_id', $menu2->id)
                                                    ->first();
                if($product_menu_update){
                    $product_menu = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $menu2->id)
                                            ->first();
                    // dd($product_menu);
                    if($product_menu){
                        if($product_menu_update->subcategory_id == $subcategory_id && $priority != $product_menu_update->priority){  // là có cập nhật priority hay không
                            $product_menu->priority = null;
                            $product_menu->update();
                        }
                    }

                    $product_menu_update->subcategory_id = $subcategory_id;
                    $product_menu_update->priority = $priority;
                    $product_menu_update->update();
                }else{
                    // tạo mới khi mà thêm một menu cho sản phẩm
                    $product_menu = new ProductMenu();
                    $product_menu->product_id = $product->id;
                    $product_menu->subcategory_id = $subcategory_id;
                    $product_menu->priority = $priority;
                    if($priority == 9){
                        $product_menu->priority = null;
                    }
                    $product_menu->save();
                }
            }else{
                $product_menu = ProductMenu::where('product_id', $product->id)
                                            ->where('subcategory_id', $menu2->id)
                                            ->first();
                if($product_menu){
                    $product_menu->delete();
                }
            }
        endforeach;
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
        if ($product->image_3) {
            $image_url3 = public_path('upload/images/product/') . $product->image_3;
            if (File::exists($image_url3)) {
                unlink($image_url3);
            }
        }
        $product_sizes = ProductSize::where('product_id', $id)->get();
        foreach ($product_sizes as $product_size) {
            $product_size->delete();
        }
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
