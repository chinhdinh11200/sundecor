<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = TinTuc::latest()->paginate(2);  //paginate: PHÂN TRANG
        // return view('admin.news.index', ['biendata' => $data]);
        $news = News::all();
        return view('admin.news.index', ['biendata' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.news.create')->with('menus', $menus);
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

        $image_url = time() . '-' . $name . '.' . $request->image->extension();
        // dd($image_url);
        $request->image->move(public_path('backend/images/tin-tuc'), $image_url);
        // dd($request->input('menu_id'));
        // News::create([
        //     'name' => $request->input('name'),
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        //     'content' => $request->input('content'),
        //     'priority' => $request->input('priority') && $request->input('priority'),
        //     'status' => $request->input('status'),
        //     'menu_id' => $request->input('menu_id'),
        //     'image' => $image_url,
        // ]);

        $new = new News();
        $new->name = $request->input('name');
        $new->title = $request->input('title');
        $new->description = $request->input('description');
        $new->content = $request->input('content');
        $new->priority = $request->input('priority') && $request->input('priority');
        $new->status = $request->input('status') ? true : false;
        $new->menu_id = $request->input('menu_id');
        $new->image = $image_url;

        $new->save();

        // $data = new News();
        // $data->tenTinTuc = $request->input('tenTinTuc'); //nhận nhập tên loại trong input
        // $data->moTaNgan = $request->input('moTaNgan'); //nhận nhập tên loại trong input
        // $data->moTaChiTiet = $request->input('moTaChiTiet'); //nhận nhập tên loại trong input
        // $data->slug = Str::slug($request->input('tenTinTuc')); //nhận nhập tên loại trong input
        // //$data->ten_img = $request->input('image'); //nhận nhập tên loại trong input
        // if ($request->hasFile('image')) //has(name-input) //has-kiểm tra tồn tại hay ko
        // {
        //     $file = $request->file('image');
        //     $ten_image = time() . '_' . $file->getClientOriginalName();
        //     $path_upload = 'upload/anh/';
        //     $request->file('image')->move($path_upload, $ten_image);
        //     $data->image = $path_upload . $ten_image;

        // }
        // $trangThai = 0;
        // if ($request->has('trangThai')) //has(name-input) //has-kiểm tra tồn tại hay ko
        // {
        //     $trangThai = $request->input('trangThai');
        // }
        // $data->trangThai = $trangThai;
        // $data->save();
        // //return redirect()->route('admin.news.index'); //điều hướng đến foder category - flie index
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $menus = Menu::all();
        return view('admin.news.edit', ['news' => $news, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,News  $news)
    {
        // $data = TinTuc::find($id);
        // $data->tenTinTuc = $request->input('tenTinTuc');
        // if($request->hasFile('image_new')){
        //     @unlink(public_path($data->image));
        //     $file = $request->file('image_new');
        //     $ten_image = time() . '_' . $file->getClientOriginalName();
        //     $path_upload = 'upload/news/';
        //     $request->file('image_new')->move($path_upload, $ten_image);
        //     $data->image = $path_upload . $ten_image;
        // }
        // $data->moTaNgan = $request->input('moTaNgan');
        // $data->moTaChiTiet = $request->input('moTaChiTiet');
        // $trangThai=0;
        // $data->slug = Str::slug($request->input('tenTinTuc'));
        // if($request->has('trangThai')) //has(name-input) //has-kiểm tra tồn tại hay ko
        // {
        //     $trangThai = $request->input('trangThai');
        // }
        // $data->trangThai = $trangThai;
        // $data->save();
        // return redirect('admin/news');
        $name = '';
        $temp = str_split($request->input('name'));
        foreach ($temp as $char) {
            if($char == ' ') {
                $char = '-';
            }
            $name .= $char;
        }

        $image_url = $request->image ? time() . '-' . $name . '.' . $request->image->extension() : $news->image;
        $request->image && $request->image->move(public_path('backend/images/tin-tuc'), $image_url);

        $new = News::find($news->id);
        $new->name = $request->input('name');
        $new->title = $request->input('title');
        $new->description = $request->input('description');
        $new->content = $request->input('content');
        $new->priority = $request->input('priority') && $request->input('priority');
        $new->status = $request->input('status') ? true : false;
        $new->menu_id = $request->input('menu_id');
        $new->image = $image_url;

        $new->update();

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
