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
        $subcategories = $request->input('menu')['subcategories'];
        $menu_exist = Menu::where('name', '=', $request->input('menu')['category'])->first();
        if($menu_exist) {
            $menu_exist->priority = $request->input('menu')['index'];
            $menu_exist->title = $request->input('menu')['title'];
            $menu_exist->content_1 = $request->input('menu')['content1'];
            $menu_exist->content_2 = $request->input('menu')['content2'];
            $menu_exist->description = $request->input('menu')['description'];
            // return ($menu_exist->name);
            $menu_exist->update();
            foreach($subcategories as $subcategory) {
                $menu2_exist = Menu::where('name', '=', $subcategory['name'])->first();
                if(!$menu2_exist){
                    $menu2 = new Menu();
                    $menu2->name = $subcategory['name'];
                    $menu2->title = $subcategory['title'];
                    $menu2->priority = $subcategory['index'];
                    $menu2->description = $subcategory['description'];
                    $menu2->content_1 = $subcategory['content1'];
                    $menu2->content_2 = $subcategory['content2'];
                    $menu2->keyword = $subcategory['name'];
                    $menu2->slug = Str::slug($subcategory['name']). '.html';
                    $menu2->status = true;
                    $menu2->parent_menu_id = $menu_exist->id;
                    $menu2->menu_type_id = 2;
                    // return ($menu2->name);
                    $menu2->save();
                }else {
                    $menu2_exist->title = $subcategory['title'];
                    $menu2_exist->priority = $subcategory['index'];
                    $menu2_exist->description = $subcategory['description'];
                    $menu2_exist->content_1 = $subcategory['content1'];
                    $menu2_exist->content_2 = $subcategory['content2'];
                    // return ($menu2_exist->name);
                    $menu2_exist->update();
                }
            }
        }else {
            $menu1 = new Menu();
            $menu1->name = $request->input('menu')['category'];
            $menu1->keyword = $request->input('menu')['category'];
            $menu1->status = true;
            $menu1->slug = Str::slug($request->input('menu')['category']). '.html';
            $menu1->priority = $request->input('menu')['index'];
            $menu1->title = $request->input('menu')['title'];
            $menu1->content_1 = $request->input('menu')['content1'];
            $menu1->content_2 = $request->input('menu')['content2'];
            $menu1->description = $request->input('menu')['description'];
            $menu1->parent_menu_id = 0;
            $menu1->menu_type_id = 2;
            // return ($menu1->name);
            $menu1->save();
            foreach($subcategories as $subcategory) {
                $menu2_exist = Menu::where('name', '=', $subcategory['name'])->first();
                if(!$menu2_exist){
                    $menu2 = new Menu();
                    $menu2->name = $subcategory['name'];
                    $menu2->title = $subcategory['title'];
                    $menu2->priority = $subcategory['index'];
                    $menu2->description = $subcategory['description'];
                    $menu2->content_1 = $subcategory['content1'];
                    $menu2->content_2 = $subcategory['content2'];
                    $menu2->keyword = $subcategory['name'];
                    $menu2->slug = Str::slug($subcategory['name']). '.html';
                    $menu2->status = true;
                    $menu2->parent_menu_id = $menu1->id;
                    $menu2->menu_type_id = 2;
                    // return ($menu2->name);
                    $menu2->save();
                }else {
                    $menu2_exist->title = $subcategory['title'];
                    $menu2_exist->priority = $subcategory['index'];
                    $menu2_exist->description = $subcategory['description'];
                    $menu2_exist->content_1 = $subcategory['content1'];
                    $menu2_exist->content_2 = $subcategory['content2'];
                    // return ($menu2_exist->name);
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
