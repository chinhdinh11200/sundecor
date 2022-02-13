<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class FiveStarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Menu::create([
            'name' => 'Dịch vụ 5 sao',
            'slug' => 'dich-vu-5-sao.html',
            'title' => 'Dịch vụ 5 sao',
            'keyword' => 'sundecor, Dịch vụ 5 sao',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Công trình đã thực hiện',
            'slug' => 'cong-trinh-da-thuc-hien.html',
            'title' => 'Công trình đã thực hiện',
            'keyword' => 'sundecor, Công trình đã thực hiện',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Kiến thức về đèn',
            'slug' => 'kien-thuc-ve-den.html',
            'title' => 'Kiến thức về đèn',
            'keyword' => 'sundecor, Kiến thức về đèn',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Bộ sưu tập đèn',
            'slug' => 'bo-suu-tap-den.html',
            'title' => 'Bộ sưu tập đèn',
            'keyword' => 'sundecor, Bộ sưu tập đèn',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Hướng dẫn sử dụng',
            'slug' => 'huong-dan-su-dung.html',
            'title' => 'Hướng dẫn sử dụng',
            'keyword' => 'sundecor, Hướng dẫn sử dụng',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);

        return "success";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menus)
    {
        //
    }
}
