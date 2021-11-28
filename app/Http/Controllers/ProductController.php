<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
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
        $products = Product::all();
        $menus = Menu::all();
        return view('admin.product.index')->with('products', $products)->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = '';
        $temp = str_split($request->input('name'));
        foreach ($temp as $char) {
            if($char == ' ') {
                $char = '-';
            }
            $name .= $char;
        }
        $imgData = [];
        if ($request->hasfile('image')) {
            foreach ($request->image as $key => $file) {
                if($key == 0) {
                    $image_url = time() . $name . '.' . $file->extension();
                    $imgData[] = $image_url;
                }
                else{
                    $image_url = time() . $name . '(' . $key . ')' . '.' . $file->extension();
                    $imgData[] = $image_url;
                }
            }
        }
        $product = new Product();
        if($imgData) {
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

        if ($success) {
            foreach ($request->image as $key => $file) {
                $file->move(public_path('upload/images/product'), $imgData[$key]);
            }
        }

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
    public function edit(Product $product)
    {
        return view('admin.product.edit', ['product' => $product]);
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
        $name = '';
        $temp = str_split($request->input('name'));
        foreach ($temp as $char) {
            if($char == ' ') {
                $char = '-';
            }
            $name .= $char;
        }
        $imgData = [];
        if ($request->hasfile('image')) {
            foreach ($request->image as $key => $file) {
                if($key == 0) {
                    $image_url = time() . $name . '.' . $file->extension();
                    $imgData[] = $image_url;
                }
                else{
                    $image_url = time() . $name . '(' . $key . ')' . '.' . $file->extension();
                    $imgData[] = $image_url;
                }
            }
        }else {
            if($product->image_1) {
                unlink(public_path('upload/images/product/'). $product->image_1);
            }
            if($product->image_2) {
                unlink(public_path('upload/images/product/'). $product->image_2);
            }
            if($product->image_3) {
                unlink(public_path('upload/images/product/'). $product->image_3);
            }
        }


        $product_update = Product::find($product->id);
        $product->image_1 ? unlink(public_path('upload/images/product/'). $product->image_1) : null;
        $product->image_2 ? unlink(public_path('upload/images/product/'). $product->image_2) : null;
        $product->image_3 ? unlink(public_path('upload/images/product/'). $product->image_3) : null;

        if($imgData) {
            foreach ($imgData as $key => $image) {
                $name = 'image_' . ($key + 1);
                $product_update->$name = $image;
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
        if ($success) {
            foreach ($request->image as $key => $file) {
                $file->move(public_path('upload/images/product'), $imgData[$key]);
            }
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image_1) {
            $image_url1 = public_path('upload/images/product/') . $product->image_1;
            unlink($image_url1);
        }
        if ($product->image_2) {
            $image_url2 = public_path('upload/images/product/') . $product->image_2;
            unlink($image_url2);
        }
        if ($product->image_2) {
            $image_url3 = public_path('upload/images/product/') . $product->image_3;
            unlink($image_url3);
        }

        Product::where('id', $product->id)->delete();
        return redirect()->route('admin.product.index');
    }
}
