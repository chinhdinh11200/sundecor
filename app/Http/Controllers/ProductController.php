<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductMenu;
use App\Models\ProductSize;
use App\Rules\Number;
use App\Rules\Required;
use App\Rules\Unique;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
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
        $product = Product::find(1);
        $menus1 = Menu::where(function ($query) {
                        $query->Where('menu_type_id', 4)
                            ->orWhere('menu_type_id', 2);
                    })
                    ->where('parent_menu_id', 0)
                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->get();
        $menus2 = Menu::where('menu_type_id', 2)
                    ->where('parent_menu_id', '!=', 0)
                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->get();
        $products = DB::table('products')
                        ->distinct()
                        ->orderBy('created_at', 'DESC')
                        ->paginate(8);

        return view('admin.product.index', ['products' => $products], compact('menus1', 'menus2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('menu_type_id', 2)->get();

        $menus1 = Menu::where(function ($query) {
                $query->Where('menu_type_id', 4)
                    ->orWhere('menu_type_id', 2);
            })
            ->where('parent_menu_id', 0)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->with(['product_menu' => function ($query) {
                $query
                ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->where('is_hot', null);
            }])
            ->with(['product_menu_hot' => function ($query) {
                $query
                ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->where('is_hot', true);
            }])
            ->get();

        $menus2 = Menu::where(function ($query) {
                $query->Where('menu_type_id', 4)
                    ->orWhere('menu_type_id', 2);
            })->where("menus.parent_menu_id","<>",0)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->with(['product_menu' => function ($query) {
                $query->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->where('is_hot', null);
            }])
            ->with(['product_menu_hot' => function ($query) {
                $query->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->where('is_hot', true);
            }])
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
        // dd($request);
        $menus = Menu::where(function($query) {
                        $query->where("menu_type_id",2)
                            ->orWhere("menu_type_id",4);
                    })
                    ->get();

        if(!$request->has('is_contact_product')) {
            $request->validate([
                'name' => [new Required, new Unique],
                'title' => [new Required, new Unique],
                'code' => [new Required, new Unique],
                'size' => new Required,
                'keyword' => new Required,
                'material' => new Required,
                'sell_price' => new Number,
                'sale_price' => new Number,
            ]);
        }else {
            $request->validate([
                'name' => [new Required, new Unique],
                'title' => [new Required, new Unique],
                'code' => [new Required, new Unique],
                'keyword' => new Required,
                'material' => new Required,
            ]);
        }

        $product = new Product();
        // for ($i=0; $i < 3; $i++) {
        //     $image = 'image_' . ($i + 1);
        //     if($request->hasFile($image)) {
        //         $file = $request->$image;
        //         $image_url = $i == 0 ? pathinfo($request->iamge->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $file->extension() : pathinfo($request->iamge->getClientOriginalName(), PATHINFO_FILENAME) . '(' . $i  . ')' . '.' . $file->extension();
        //         $file->move(public_path('upload/images/product'), $image_url);
        //         $product->$image = $image_url;
        //     }
        // }

        $product_exist = Product::where('name', $request->input('name'))
                                    ->orWhere('code', $request->input('code'))
                                    ->first();

        if($product_exist) {
            return redirect()->back()->withInput($request->input());
        }

        if($request->hasFile('image_1')) {
            $file = $request->image_1;
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)). '.' . $file->extension();
            // dd($image_url);
            $file->move(public_path('upload/images/product'), $image_url);
            $product->image_1 = $image_url;
        }

        if($request->hasFile('image_2')) {
            $file = $request->image_2;
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)). '.' . $file->extension();
            // dd($image_url);
            $file->move(public_path('upload/images/product'), $image_url);
            $product->image_2 = $image_url;
        }

        if($request->hasFile('image_3')) {
            $file = $request->image_3;
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)). '.' . $file->extension();
            // dd($image_url);
            $file->move(public_path('upload/images/product'), $image_url);
            $product->image_3 = $image_url;
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
        $product->keyword = $request->input('keyword');
        $product->material = $request->input('material');
        $product->color = $request->input('color');
        $product->image_main = $request->input('image_main');
        $product->slug = Str::slug($request->input('name')).'.html';

        $product->save();

        if(!$request->has('is_contact_product')){
            if($request->has('size')){
                $size = $request->input('size');
                if ($size[0]) {
                    foreach ($request->input('size') as $key => $value) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size = $value;
                        if(!$request->input('is_contact_product')){
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sell_price')[$key]));
                            $product_size->sell_price = $price;
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sale_price')[$key]));
                            $product_size->sale_price = $price;
                        }
                        $product_size->save();
                    };
                }
            }
        }else {
            $size = $request->input('size');
            if ($size[0]) {
                foreach ($request->input('size') as $key => $value) {
                    $product_size = new ProductSize();
                    $product_size->product_id = $product->id;
                    $product_size->size = $value;
                    $product_size->save();
                };
            }
        }

        foreach($menus as $menu):
            if($request->input('priority'.$menu->id)){
                $priority = $request->input('priority'.$menu->id);
                $subcategory_id = $menu->id;
                $priority_exist = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $subcategory_id)
                                            ->first();

                if($priority_exist) {
                    $priority_exist->priority = null;
                    $priority_exist->update();
                }

                $product_menu = new ProductMenu();
                $product_menu->product_id = $product->id;
                $product_menu->subcategory_id = $subcategory_id;
                $product_menu->priority = $priority;

                $product_menu->save();
            }
            if($request->input('priority_hot'.$menu->id) && $menu->parent_menu_id == 0){
                $priority = $request->input('priority_hot'.$menu->id);
                $subcategory_id = $menu->id;
                $priority_exist = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $subcategory_id)
                                            ->where('is_hot', true)
                                            ->first();

                if($priority_exist) {
                    $priority_exist->priority = null;
                    $priority_exist->update();
                }

                $product_menu = new ProductMenu();
                $product_menu->product_id = $product->id;
                $product_menu->subcategory_id = $subcategory_id;
                $product_menu->priority = $priority;
                $product_menu->is_hot = true;

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
        $menus1 = Menu::where(function ($query) {
                            $query->Where('menu_type_id', 4)
                                ->orWhere('menu_type_id', 2);
                        })
                        ->where('parent_menu_id', 0)
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        ->get();
        $menus2 = Menu::where('menu_type_id', 2)
                    ->where('parent_menu_id', '!=', 0)
                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->get();
        // $menu = Menu::where('id', $id)->first();

        $menu = Menu::with(['products' => function ($query) {
                            $query->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                            ->orderBy('created_at', 'DESC');
                        }])
                        ->where('id', $id)
                        ->first();
                        // dd($menu);
        // $menu = Menu::find($id);
        // if($menu->parent_menu_id == 0) {
        //     $products = $menu->product_menus()->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')->paginate(8);
        // }else {
        //     $products = $menu->products()->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')->paginate(8);
        //     // dd($products);
        // }
        $data = $menu->products;
        $page = request("page") ?? 1;;
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;
        $products = new LengthAwarePaginator(
            array_slice($data->toArray(), $offset, $perPage, true),
            count($data),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('admin.product.show', compact('menus1', 'menus2', 'products'))->with('menu_show', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_edit = Product::where('products.id', $id)->with('product_size')->first();
        $menus1 = Menu::where(function ($query) {
                        $query->Where('menu_type_id', 4)
                            ->orWhere('menu_type_id', 2);
                    })
                    ->where('parent_menu_id', 0)
                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->with(['product_menu' => function ($query) {
                        $query
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                            ->where('is_hot', null);
                    }])
                    ->with(['product_menu_hot' => function ($query) {
                        $query
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                            ->where('is_hot', true);
                    }])
                    ->with(['products' => function ($query) use ($id) {
                        $query->where('products.id', $id)->orderBy(DB::raw('ISNULL(is_hot), is_hot'), 'ASC');
                    }])
                    // ->where('id', 106)
                    ->get();
                    // dd($menus1);
        if($product_edit == null){  // update product don't have menu2
            $product_edit = Product::find($id);
        }


        $menus2 = Menu::where(function ($query) {
                        $query->Where('menu_type_id', 4)
                            ->orWhere('menu_type_id', 2);
                    })->where("menus.parent_menu_id","<>",0)
                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->with(['product_menu' => function ($query) use ($id) {
                        $query->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                            ->where('is_hot', null);
                    }])
                    ->with(['product_menu_hot' => function ($query) use ($id) {
                        $query->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                            ->where('is_hot', true);
                    }])
                    ->with(['products' => function ($query) use ($id) {
                        $query->where('products.id', $id)->orderBy(DB::raw('ISNULL(is_hot), is_hot'), 'ASC');
                    }])
                    // ->where('id', 107)
                    ->get();
        // dd(isset($menus2[0]->products), $menus2[0]->products->count());
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
        // dd($request , $product);
        if(!$request->has('is_contact_product')) {
            $request->validate([
                'name' => [new Required],
                'title' => [new Required],
                'code' => [new Required],
                'size' => new Required,
                'keyword' => new Required,
                'material' => new Required,
                'sell_price' => new Number,
                'sale_price' => new Number,
            ]);
        }else {
            $request->validate([
                'name' => [new Required],
                'title' => [new Required],
                'code' => [new Required],
                'keyword' => new Required,
                'material' => new Required,
            ]);
        }

        $product_update = Product::with('menus')->find($product->id);
        $menus = Menu::where(function($query) {
                            $query->where("menu_type_id",2)
                                ->orWhere("menu_type_id",4);
                        })
                        ->get();

        // for ($i=0; $i < 3; $i++) {
        //     $image = 'image_' . ($i + 1);
        //     if($request->hasFile($image)) {
        //         $file = $request->$image;
        //         $image_url = $i == 0 ? time() . '.' . $file->extension() : time() . '(' . $i  . ')' . '.' . $file->extension();
        //         $file->move(public_path('upload/images/product'), $image_url);
        //         $product_update->$image = $image_url;
        //     }
        // }

        if($request->hasFile('image_1')) {
            $image_url_exist = $product_update->image_1;
            if($image_url_exist) {
                if(File::exists(public_path('upload/images/product/') . $image_url_exist)) {
                    unlink(public_path('upload/images/product/') . $image_url_exist);
                }
            }
            $file = $request->image_1;
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
            // dd($image_url);
            $file->move(public_path('upload/images/product'), $image_url);
            $product_update->image_1 = $image_url;
        }

        if($request->hasFile('image_2')) {
            $image_url_exist = $product_update->image_2;
            if($image_url_exist) {
                if(File::exists(public_path('upload/images/product/') . $image_url_exist)) {
                    unlink(public_path('upload/images/product/') . $image_url_exist);
                }
            }
            $file = $request->image_2;
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)). '.' . $file->extension();
            // dd($image_url);
            $file->move(public_path('upload/images/product'), $image_url);
            $product_update->image_2 = $image_url;
        }

        if($request->hasFile('image_3')) {
            $image_url_exist = $product_update->image_3;
            if($image_url_exist) {
                if(File::exists(public_path('upload/images/product/') . $image_url_exist)) {
                    unlink(public_path('upload/images/product/') . $image_url_exist);
                }
            }
            $file = $request->image_3;
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)). '.' . $file->extension();
            // dd($image_url);
            $file->move(public_path('upload/images/product'), $image_url);
            $product_update->image_3 = $image_url;
        }


        $product_update->name = $request->input('name');
        $product_update->slug = Str::slug($request->input('name')).'.html';
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
        $product_update->keyword = $request->input('keyword');
        $product_update->material = $request->input('material');
        $product_update->color = $request->input('color');
        $product_update->image_main = $request->input('image_main');
        $product_update->update();

        if(!$request->input('is_contact_product')){
            if($request->has('size')){
                $product_sizes = ProductSize::where('product_id', $product->id)->get();
                $count_product_sizes = ProductSize::where('product_id', $product->id)->count();
                if($request->has('size')) {
                    $count_product_size_request =  count($request->input('size'));
                }else {
                    $count_product_size_request =  0;
                }
                if($count_product_size_request > $count_product_sizes){
                    foreach ($product_sizes as $key => $product_size) {
                        $product_size->product_id = $product->id;
                        $product_size->size = $request->input('size')[$key];
                        if(!$request->input('is_contact_product')){
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sell_price')[$key]));
                            $product_size->sell_price = $price;
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sale_price')[$key]));
                            $product_size->sale_price = $price;
                        }
                        $product_size->update();
                    };
                    for ($i= $count_product_sizes; $i < $count_product_size_request; $i++) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size = $request->input('size')[$i];
                        if(!$request->input('is_contact_product')){
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sell_price')[$i]));
                            $product_size->sell_price = $price;
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sale_price')[$i]));
                            $product_size->sale_price = $price;
                        }
                        $product_size->save();
                    }
                }else if($count_product_size_request == $count_product_sizes){
                    foreach ($product_sizes as $key => $product_size) {
                        $product_size->product_id = $product->id;
                        $product_size->size = $request->input('size')[$key];
                        if(!$request->input('is_contact_product')){
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sell_price')[$key]));
                            $product_size->sell_price = $price;
                            $price = intval(preg_replace('/[^\d.]/', '', $request->input('sale_price')[$key]));
                            $product_size->sale_price = $price;
                        }
                        $product_size->update();
                    };
                }else {
                    for ($i= $count_product_size_request ; $i < $count_product_sizes; $i++) {
                        $product_sizes[$i] -> delete();
                    }
                }
            }
        }else { // l?? s???n ph???m li??n h???
            if($request->has('size')){
                $product_sizes = ProductSize::where('product_id', $product->id)->get();
                if(!empty($product_sizes)) {
                    $count_product_sizes = ProductSize::where('product_id', $product->id)->count();
                    for ($i= 0 ; $i < $count_product_sizes; $i++) {
                        $product_sizes[$i] -> delete();
                    }
                }
                $size = $request->input('size');
                // dd($size[0]);
                if ($size[0]) {
                    foreach ($request->input('size') as $key => $value) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size = $value;
                        $product_size->save();
                    }
                }
            }
        }
        foreach($menus as $menu):
            if($request->input('priority'.$menu->id)){

                // dd($request);
                // t??m product_menu hi???n t???i c???n update
                $priority = $request->input('priority'.$menu->id);
                $subcategory_id = $menu->id;

                $product_menu_update = ProductMenu::where('product_id', $product_update->id)
                                                    ->where('subcategory_id', $subcategory_id)
                                                    ->where('is_hot', null)
                                                    ->first();
                if($product_menu_update){ // tr?????c khi update t??m xem c?? sp n??o tr??ng ??u ti??n ch??a
                    $product_menu = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $subcategory_id)
                                            ->where('is_hot', null)
                                            ->first();
                    if($product_menu){
                        if($product_menu->product_id != $product_menu_update->product_id){
                            $product_menu->priority = null;
                            $product_menu->update();
                        }
                    }

                    $product_menu_update->subcategory_id = $subcategory_id;
                    $product_menu_update->priority = $priority;
                    $product_menu_update->update();
                }else{
                    $product_menu = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $subcategory_id)
                                            ->where('is_hot', null)
                                            ->first();
                    if($product_menu){ // check priority available
                        $product_menu->priority = null;
                        $product_menu->update();
                    }
                    // t???o m???i khi m?? th??m m???t menu cho s???n ph???m
                    $product_menu = new ProductMenu();
                    $product_menu->product_id = $product->id;
                    $product_menu->priority = $priority;
                    $product_menu->subcategory_id = $subcategory_id;
                    $product_menu->save();
                }
            }else{
                $product_menu = ProductMenu::where('product_id', $product->id)
                                            ->where('subcategory_id', $menu->id)
                                            ->where('is_hot', null)
                                            ->first();
                if($product_menu){
                    $product_menu->delete();
                }
            }

            if($request->input('priority_hot'.$menu->id) && $menu->parent_menu_id == 0){
                $priority = $request->input('priority_hot'.$menu->id);
                $subcategory_id = $menu->id;

                $product_menu_update = ProductMenu::where('product_id', $product_update->id)
                                                    ->where('subcategory_id', $subcategory_id)
                                                    ->where('is_hot', true)
                                                    ->first();

                if($product_menu_update){ // tr?????c khi update t??m xem c?? sp n??o tr??ng ??u ti??n ch??a
                    $product_menu = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $subcategory_id)
                                            ->where('is_hot', true)
                                            ->first();
                    if($product_menu){
                        if($product_menu->product_id != $product_menu_update->product_id){
                            $product_menu->priority = null;
                            $product_menu->update();
                        }
                    }

                    $product_menu_update->subcategory_id = $subcategory_id;
                    $product_menu_update->priority = $priority;
                    $product_menu_update->is_hot = true;
                    $product_menu_update->update();
                }else{
                    $product_menu = ProductMenu::where('priority', $priority)
                                            ->where('subcategory_id', $subcategory_id)
                                            ->where('is_hot', true)
                                            ->first();
                    // dd($product_menu);
                    if($product_menu){ // check priority available
                        $product_menu->priority = null;
                        $product_menu->update();
                    }
                    // t???o m???i khi m?? th??m m???t menu cho s???n ph???m
                    $product_menu = new ProductMenu();
                    $product_menu->product_id = $product->id;
                    $product_menu->priority = $priority;
                    $product_menu->subcategory_id = $subcategory_id;
                    $product_menu->is_hot = true;

                    $product_menu->save();
                }
            }else {
                $product_menu = ProductMenu::where('product_id', $product->id)
                                ->where('subcategory_id', $menu->id)
                                ->where('is_hot', true)
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

        $product_menus = ProductMenu::where('product_id', $id)->get();
        foreach ($product_menus as $product_menu) {
            $product_menu->delete();
        }

        $product->delete();
        return redirect()->route('admin.product.index');
    }

    public function fill($id, $is_hot)
    {
        $hot = $is_hot == 'false' ? null : true;
        $menus1 = Menu::where(function ($query) {
                            $query->Where('menu_type_id', 4)
                                ->orWhere('menu_type_id', 2);
                        })
                        ->where('parent_menu_id', 0)
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        ->get();
        $menus2 = Menu::where('menu_type_id', 2)
                    ->where('parent_menu_id', '!=', 0)
                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->get();
        // $menu = Menu::where('id', $id)->first();

        $menu = Menu::with(['products' => function ($query) use ($hot) {
                            $query->where('is_hot', $hot)
                                ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                                ->orderBy('created_at', 'DESC');
                        }])
                        ->where('id', $id)
                        ->first();
        // dd($menu);
        $data = $menu->products;
        $page = request("page") ?? 1;;
        $perPage = 8;
        $offset = ($page * $perPage) - $perPage;
        $products = new LengthAwarePaginator(
            array_slice($data->toArray(), $offset, $perPage, true),
            count($data),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('admin.product.show', compact('menus1', 'menus2', 'products', 'hot'))->with('menu_show', $menu);
    }

    public function detailProduct ($slug) {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.product');
    }

    public function search(Request $request){
        $search = Str::slug(($request->input('s')));

        if($search == ''){
            return redirect()->route('admin.product.index');
        }else {
            $menus1 = Menu::where(function ($query) {
                                $query->Where('menu_type_id', 4)
                                    ->orWhere('menu_type_id', 2);
                            })
                            ->where('parent_menu_id', 0)
                            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                            ->get();
            $menus2 = Menu::where('menu_type_id', 2)
                        ->where('parent_menu_id', '!=', 0)
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        ->get();
            $products = Product::where('products.slug', 'like', '%'. $search . '%')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(8);
                    $products->appends(['s' => $search]);
        }
        return view('admin.product.search', compact('menus1', 'menus2'))->with('products', $products);
    }
}
