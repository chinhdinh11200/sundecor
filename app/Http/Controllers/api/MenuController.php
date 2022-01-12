<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 200;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu_exist = Menu::where('name', '=', $request->input('menu')['category'])->first();
        if($menu_exist) {
            $menu_exist->priority = $request->input('menu')['index'];
            $menu_exist->title = $request->input('menu')['category'];
            $menu_exist->update();
            foreach($request->input('menu')['subcategories'] as $key => $subcategory) {
                $menu2_exist = Menu::where('name', '=', $subcategory)->first();
                if(!$menu2_exist){
                    $menu2 = new Menu();
                    $menu2->name = $subcategory;
                    $menu2->title = $subcategory;
                    $menu2->keyword = $subcategory;
                    $menu2->slug = Str::slug($subcategory). '.html';
                    $menu2->status = true;
                    $menu2->parent_menu_id = $menu_exist->id;
                    $menu2->menu_type_id = 2;
                    $menu2->save();
                }else {
                    $menu2_exist->title = $subcategory;
                    $menu2_exist->update();
                }
            }
        }else {
            $menu1 = new Menu();
            $menu1->name = $request->input('menu')['category'];
            $menu1->title = $request->input('menu')['category'];
            $menu1->keyword = $request->input('menu')['category'];
            $menu1->status = true;
            $menu1->slug = Str::slug($request->input('menu')['category']). '.html';
            $menu1->priority = $request->input('menu')['index'];
            $menu1->parent_menu_id = 0;
            $menu1->menu_type_id = 2;
            $menu1->save();
            foreach($request->input('menu')['subcategories'] as $key => $subcategory) {
                $menu2_exist = Menu::where('name', '=', $subcategory)->first();
                if(!$menu2_exist){
                    $menu2 = new Menu();
                    $menu2->name = $subcategory;
                    $menu2->title = $subcategory;
                    $menu2->keyword = $subcategory;
                    $menu2->slug = Str::slug($subcategory). '.html';
                    $menu2->status = true;
                    $menu2->parent_menu_id = $menu1->id;
                    $menu2->menu_type_id = 2;
                    $menu2->save();
                }else {
                    $menu2_exist->title = $subcategory;
                    $menu2_exist->update();
                }
            }
        }
        return 200;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
