<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menutype;
use Illuminate\Support\Str;

class Menu1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('admin.menu1.index', ['datas' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        $menutype = Menutype::all();
        return view('admin.menu1.create', ['menutype' => $menutype])->with('menus', $menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Menu();
        $data->name = $request->input('name'); //nhận nhập tên loại trong input
        $data->title = $request->input('title'); //nhận nhập tên loại trong input
        $data->menu_type_id = $request->input('menu_type_id');
        $data->content_1 = $request->input('content_1'); //nhận nhập tên loại trong input
        $data->content_2 = $request->input('content_2');
        $data->keyword = Str::slug($request->input('keyword')); //nhận nhập tên loại trong input
        $data->priority = $request->input('priority');
        if ($request->has('priority')){
//             $check = Menu::where('id',$data->menu_type_id);
//             foreach($check as $ch){
//                 if($data->priority==$ch->priority){
//                     $data->priority=$ch->priority;
//                     $ch->priority="null";
//                     $check->save();
//                     break;
//                 }
            $check = Menu::where('priority', $data->menu_type_id)->first();
            if($check != null){
                $data->priority=$check->priority;
                $check->priority= null;
                $check->save();
            }
        }
        //$data->ten_img = $request->input('images'); //nhận nhập tên loại trong input
        if ($request->hasFile('images')) //has(name-input) //has-kiểm tra tồn tại hay ko
        {
            $file = $request->file('images');
            $ten_images = time() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/anh/';
            $request->file('images')->move($path_upload, $ten_images);
            $data->images = $path_upload . $ten_images;
        }
        $data->parent_menu_id = "0";
        if ($request->has('parent_menu_id')){
            $data->parent_menu_id = $request->input('parent_menu_id');
        }

        $data->description = $request->input('description');
        $data->content_1 = $request->input('content_1');
        $data->content_2 = $request->input('content_2');
        $status = 0;
        if ($request->has('status')) //has(name-input) //has-kiểm tra tồn tại hay ko
        {
            $status = $request->input('status');
        }
        $data->status = $status;
        $data->save();
        return redirect()->route('admin.menu1.index'); //điều hướng đến foder category - flie index
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
}
