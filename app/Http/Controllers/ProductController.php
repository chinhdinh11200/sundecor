<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductMenu;
use App\Models\ProductSize;
use App\Rules\Required;
use App\Rules\Unique;
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
        $menus1 = Menu::where("parent_menu_id", "=", 0)->get();

        $menus2 = Menu::join('menus AS menus1', 'menus1.id', '=', 'menus.parent_menu_id')
            ->select('menus.*', 'menus1.name AS parant_name', 'menus1.id AS parent_id')
            ->where("menus.parent_menu_id","<>",0)
            ->where("menus.menu_type_id",2)
            ->where("menus.status",1)
            ->orderBy('menus.parent_menu_id')
            ->get();

        return view('admin.product.create', ['menus' => $menus, 'menus2' => $menus2])->with('menus1', $menus1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:products',
        //     'code' => 'required|unique:products',
        //     'title' => 'required',
        //     'content' => 'required',
        //     'description' => 'required'
        // ], [
        //     'name.unique' => 'Sản phầm này đã tồn tại!',
        //     'name.required' => 'Vui lòng nhập vào tên sản phẩm',
        //     'code.unique' => 'Mã sản phầm này đã tồn tại!',
        //     'code.required' => 'Vui lòng nhập vào mã sản phẩm',
        //     'title.required' => 'Vui lòng nhập vào tiêu đề sản phẩm',
        //     'content.required' => 'Vui lòng nhập vào nội dung sản phẩm',
        //     'description.required' => 'Vui lòng nhập vào mô tả sản phẩm'
        // ]);

        $request->validate([
            'name' => [new Required, new Unique],
            'title' => [new Required, new Unique],
            'code' => [new Required, new Unique],
            // 'description' => new Required,
            'size' => new Required,
            // 'content' => new Required,
        ]);
        $menus2 = Menu::where("parent_menu_id","<>",0)
                        ->where("menu_type_id",2)
                        ->where("status",1)
                        ->limit(8)
                        ->get();

        $imgData = [];
        if ($request->hasfile('image')) {
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
        $product->slug = Str::slug($request->input('name')).'.html';

        $success = $product->save();

        if($request->image) {
            foreach ($request->image as $key => $file) {
                $file->move(public_path('upload/images/product'), $imgData[$key]);
            }
        }

        foreach ($request->input('size') as $key => $value) {
            $product_size = new ProductSize();
            $product_size->product_id = $product->id;
            $product_size->size = $value;
            if(!$request->input('is_contact_product')){
                $product_size->sell_price = $request->input('sell_price')[$key];
                $product_size->sale_price = $request->input('sale_price')[$key];
            }
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
        // dd($id);
        $menus = Menu::all();
        $products = DB::table('menus')
                    ->join('menus AS menus2', 'menus2.parent_menu_id', '=', 'menus.id')
                    ->join('product_menu', 'product_menu.subcategory_id', '=', 'menus2.id')
                    ->join('products', 'product_menu.product_id', '=', 'products.id')
                    ->select('products.*')
                    ->where('product_menu.subcategory_id', $id)
                    ->orwhere('menus.id', $id)
                    ->paginate(8);
        return view('admin.product.show')->with('menus', $menus)->with('products', $products)->with('menu_id', $id);
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
            ->get(['products.id', 'products.name', 'products.code', 'products.title', 'products.description', 'products.content', 'products.specifications', 'products.sold_out', 'products.guarantee', 'products.status', 'products.image_1', 'products.image_2', 'products.image_3', 'products.is_contact_product', 'products.is_sale_in_month', 'products.is_hot_product', 'products.created_at', 'product_menu.priority',])
            ->first();
        if($product_edit == null){  // update product don't have menu2
            $product_edit = Product::find($id);
        }
        $menus1 = Menu::where("parent_menu_id", "=", 0)->get();
        $menus2 = Menu::join('menus AS menus1', 'menus1.id', '=', 'menus.parent_menu_id')
            ->select('menus.*', 'menus1.name AS parant_name', 'menus1.id AS parent_id')
            ->where("menus.parent_menu_id","<>",0)
            ->where("menus.menu_type_id",2)
            ->where("menus.status",1)
            ->orderBy('menus.parent_menu_id')
            ->get();
        $product_menus = ProductMenu::all();
        $product_sizes = ProductSize::where('product_id', $id)->get();
        return view('admin.product.edit', ['product' => $product_edit], ['menus2' => $menus2])->with( 'product_menus', $product_menus)->with( 'product_sizes', $product_sizes)->with('menus1', $menus1);
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
        $product_update = Product::find($product->id);
        $menus2 = Menu::where("parent_menu_id","<>",0)
                        ->where("menu_type_id",2)
                        ->where("status",1)
                        ->get();

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
        $product->slug = Str::slug($request->input('name')).'.html';
        $product_update->title = $request->input('title');
        $product_update->code = $request->input('code');
        $product_update->guarantee = $request->input('guarantee');
        $product_update->status = $request->input('status');
        $product_update->description = $request->input('description');
        $product_update->content = $request->input('content');
        $product_update->specifications = $request->input('specifications');
        $product_update->is_contact_product = $request->input('is_contact_product');
        $product_update->is_sale_in_month = $request->input('is_sale_in_month');
        $product_update->is_hot_product = $request->input('is_hot_product');
        $product_update->sold_out = $request->input('sold_out');
        $product_update->update();

        $product_sizes = ProductSize::where('product_id', $product->id)->get();
        if(count($request->input('size')) > count($product_sizes)){
            foreach ($product_sizes as $key => $product_size) {
                $product_size->product_id = $product->id;
                $product_size->size = $request->input('size')[$key];
                if(!$request->input('is_contact_product')){
                    $product_size->sell_price = $request->input('sell_price')[$key];
                    $product_size->sale_price = $request->input('sale_price')[$key];
                }
                $product_size->update();
            };
            for ($i= count($product_sizes); $i < count($request->input('size')); $i++) {
                $product_size = new ProductSize();
                $product_size->product_id = $product->id;
                $product_size->size = $request->input('size')[$i];
                if(!$request->input('is_contact_product')){
                    $product_size->sell_price = $request->input('sell_price')[$i];
                    $product_size->sale_price = $request->input('sale_price')[$i];
                }
                $product_size->save();
            }
        }else {
            for ($i= count($request->input('size')) ; $i < count($product_sizes); $i++) {
                $product_sizes[$i] -> delete();
            }
        }

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

    public function getListProduct() {
        $menus1 = Menu::where('parent_menu_id', 0)->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->get();
        $products = DB::table('menus')->join('menus AS menus2', 'menus2.parent_menu_id', '=', 'menus.id')
                        ->join('product_menu', 'product_menu.subcategory_id', '=', 'menus2.id')
                        ->join('products', 'product_menu.product_id', '=', 'products.id')
                        ->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')
                        ->distinct()
                        ->select('products.*', 'product_menu.priority', 'menus.id AS parent_id', 'product_sizes.sale_price', 'product_sizes.sell_price')
                        ->where('product_menu.priority', '<>', 'NULL')
                        // ->where('menus.id', $menus1[2]->id)
                        ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
                        ->get();

        $product_result = array();
        foreach ($menus1 as $key => $menu1) {
            $quantity = 0;
            foreach ($products as $key1 => $product) {
                if($product->parent_id == $menu1->id){
                    $check = 0;
                    foreach ($product_result as $key2 => $value) {
                        if($product->name == $value->name && $product->parent_id == $value->parent_id) {
                            $check += 1;
                        }
                    }
                    if($check == 0) {
                        $product_result[] = $product;
                        $quantity +=1;
                    }
                }
                if($quantity == 8){
                    break;
                }
            }
        }
        return view('wel')->with('menus1', $menus1)->with('products', $product_result);
    }

    public function getListProductHot() {
        $products = DB::table('products')->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')
                            ->join('product_menu', 'product_menu.product_id', '=', 'products.id')
                            ->select('products.*', 'product_sizes.*', 'product_menu.priority')
                            ->where('is_hot_product', true)
                            ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'))
                            ->get();

        $product_result = array();
        foreach ($products as $key1 => $product) {
            $check = 0;
            foreach ($product_result as $key2 => $value) {
                if($product->name == $value->name) {     // trùng tên khác ưu tiên mà cùng menu
                    $check += 1;
                }
            }
            if($check == 0) {
                $product_result[] = $product;
            }
        }
        dd($product_result);
    }

    public function getListProductSale() {
        $products = DB::table('products')->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')
                            ->join('product_menu', 'product_menu.product_id', '=', 'products.id')
                            ->select('products.*', 'product_sizes.*', 'product_menu.priority')
                            ->where('is_sale_in_month', true)
                            ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'))
                            ->limit(8)
                            ->get();
        $product_result = array();
        foreach ($products as $key1 => $product) {
            $check = 0;
            foreach ($product_result as $key2 => $value) {
                if($product->name == $value->name) {     // trùng tên khác ưu tiên mà cùng menu
                    $check += 1;
                }
            }
            if($check == 0) {
                $product_result[] = $product;
            }
        }
        dd($product_result);
    }

    public function detailProduct ($slug) {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.product');
    }
}
