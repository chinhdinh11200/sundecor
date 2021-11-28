<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuNew;
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
        $menus = Menu::all();
        $news = $menus[0]->news()->get();
        return view('admin.news.index', ['news' => $news, 'menus' => $menus]);
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
        $request->image->move(public_path('upload/images/news'), $image_url);

        $new = new News();
        $new->name = $request->input('name');
        $new->title = $request->input('title');
        $new->description = $request->input('description');
        $new->content = $request->input('content');
        $new->priority = $request->input('priority');
        $new->status = $request->input('status') ? true : false;
        $new->menu_id = $request->input('menu_id');
        $new->image = $image_url;
        $new->save();

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
        // dd($request);
        $new = News::find($news->id);
        $new->name = $request->input('name');
        $new->title = $request->input('title');
        $new->description = $request->input('description');
        $new->content = $request->input('content');
        $new->priority = $request->input('priority') ? $request->input('priority'): $news->priority;
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
        // dd($news);
        $new = News::find($news->id);

        $image_url = public_path('upload/images/news/'). $new->image;

        unlink($image_url);
        News::where('id', $new->id)->delete();
        return redirect()->route('admin.news.index');
    }
}
