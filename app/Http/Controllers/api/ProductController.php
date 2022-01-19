<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMenu;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return rand(1, 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_exist = Product::where('name', $request->input('cloneProject')['name'])
                                    ->orWhere('code', $request->input('cloneProject')['code'])
                                    ->first();
        // return $product_exist->name;
        if(!$product_exist) {
            $product = new Product();
            $product->name = $request->input('cloneProject')['name'];
            $product->slug = Str::slug($request->input('cloneProject')['name']). '.html';
            $product->title = $request->input('cloneProject')['title'];
            $product->code = $request->input('cloneProject')['code'];
            $product->guarantee = $request->input('cloneProject')['guarantee'];
            $product->status = true;
            $product->description = $request->input('cloneProject')['description'];
            $product->content = $request->input('cloneProject')['content'];
            $product->sold_out = $request->input('cloneProject')['status'];
            $url = $request->input('cloneProject')['image_1'];
            $contents = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $name = time() . rand(1, 100) . '.' . $extension;
            $product->image_1 = $name;
            Storage::disk('public')->put($name, $contents);   // sửa lại filesystem = storage_path('app/public') ( gốc ) ;
            if($request->input('cloneProject')['is_contact_product']){
                $product->is_contact_product = $request->input('cloneProject')['is_contact_product'];
            }
            
            $product->save();

            $product_menu = new ProductMenu();
            $product_menu->subcategory_id = $request->input('subcategory_id');
            $product_menu->product_id = $product->id;
            $product_menu->save();

            $product_size = new ProductSize();
            $product_size->product_id = $product->id;
            $product_size->size = $request->input('cloneProject')['size'];
            if(!$request->input('cloneProject')['is_contact_product']){
                $product_size->sell_price = $request->input('cloneProject')['sell_price'];
                $product_size->sale_price = $request->input('cloneProject')['sale_price'];
            }
            $product_size->save();
            return 200;
        } else {

            if($request->input('cloneProject')['is_contact_product']){
                $product_exist->is_contact_product = $request->input('cloneProject')['is_contact_product'];
                $product_exist->update();

                $product_size_exist = ProductSize::where('product_id', $product_exist->id)
                                            ->where('size', $request->input('cloneProject')['size'])
                                            ->first();

                if(!$product_exist->is_contact_product){
                    if(!$product_size_exist->product_id){
                        $product_size = new ProductSize();
                        $product_size->product_id = $product_exist->id;
                        $product_size->size = $request->input('cloneProject')['size'];
                        $product_size->save();
                    }else {
                        $product_size_exist->product_id = $product_exist->id;
                        $product_size_exist->size = $request->input('cloneProject')['size'];
                        $product_size_exist->update();
                    }
                }
                return "update contact 201";
            }else {
                $product_size_exist = ProductSize::where('product_id', $product_exist->id)
                                            ->where('size', $request->input('cloneProject')['size'])
                                            ->orWhere('sell_price', $request->input('cloneProject')['sell_price'])
                                            ->orWhere('sale_price', $request->input('cloneProject')['sale_price'])
                                            ->first();

                if(!$product_exist->is_contact_product){
                    if(!$product_size_exist->product_id){
                        $product_size = new ProductSize();
                        $product_size->product_id = $product_exist->id;
                        $product_size->size = $request->input('cloneProject')['size'];
                        $product_size->sell_price = $request->input('cloneProject')['sell_price'];
                        $product_size->sale_price = $request->input('cloneProject')['sale_price'];
                        $product_size->save();
                    }else {
                        $product_size_exist->product_id = $product_exist->id;
                        $product_size_exist->size = $request->input('cloneProject')['size'];
                        $product_size_exist->sell_price = $request->input('cloneProject')['sell_price'];
                        $product_size_exist->sale_price = $request->input('cloneProject')['sale_price'];
                        $product_size_exist->update();
                    }
                }
            }

        }
        return $product_exist->name . '201';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
