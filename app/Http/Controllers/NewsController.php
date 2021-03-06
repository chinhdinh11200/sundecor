<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuNew;
use App\Models\News;
use App\Rules\Required;
use App\Rules\Unique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $menus1 = Menu::where('parent_menu_id', 0)->get();
        $menus2 = Menu::where('parent_menu_id', '!=', '0')->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
        ->orderBy('created_at', 'DESC')->get();
        $news = News::orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->paginate(8);
        return view('admin.news.index', compact('news', 'menus1', 'menus2'));
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
        $request->validate([
            'name' => [new Required, new Unique],
            'title' => [new Required, new Unique],
            'keyword' => [new Required],
        ]);
        $new_check = News::where('menu_id', $request->input('menu_id'))
                            ->where('priority', $request->input('priority'))
                            ->first();
        if($new_check){
            $new_check->priority = null;
            $new_check->update();
        }

        $image_url = '';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
            $request->image->move(public_path('upload/images/news'), $image_url);
        }

        $menu_new = Menu::find($request->input('menu_id'));

        $new = new News();
        $new->name = $request->input('name');

        $new->slug = Str::slug($request->input('name')) . '.html';
        $new->title = $request->input('title');
        $new->description = $request->input('description');
        $new->content = $request->input('content');
        $new->keyword = $request->input('keyword');
        $new->status = $request->input('status') ? true : false;
        $new->menu_id = $request->input('menu_id');
        $new->priority = $request->input('priority');
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
    public function show($id)
    {
        $menus = Menu::all();
        $news = DB::table('news')
                    ->where('news.menu_id', $id)
                    ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->select('news.*')
                    ->paginate(8);
        return view('admin.news.show', ['news' => $news, 'menus' => $menus, 'menu_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
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
        $request->validate([
            'name' => [new Required],
            'title' => [new Required],
            'keyword' => [new Required],
        ]);
        $new_check = News::where('menu_id', $request->input('menu_id'))
                            ->where('priority', $request->input('priority'))
                            ->first();

        if($new_check){
            $new_check->priority = null;
            $new_check->update();
        }

        $image_url = '';
        if($request->hasFile('image')){
            if($news->image){
                if(File::exists(public_path('upload/images/news/'). $news->image)){
                    unlink(public_path('upload/images/news/'). $news->image);
                }
            }
            $file = $request->file('image');
            $image_url = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
            $request->image->move(public_path('upload/images/news'), $image_url);
        }

        $menu_new = Menu::find($request->input('menu_id'));

        $new = News::find($news->id);
        $new->name = $request->input('name');
        $new->slug = Str::slug($request->input('name')) . '.html';
        $new->title = $request->input('title');
        $new->description = $request->input('description');
        $new->content = $request->input('content');
        $new->keyword = $request->input('keyword');
        $new->priority = $request->input('priority');
        $new->status = $request->input('status') ? true : false;
        $new->menu_id = $request->input('menu_id');
        if($image_url) {
            $new->image = $image_url;
        }else {
            $new->image = $news->image;
        }

        $new->update();

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        if($new->menu_id == 1){
            return back();
        }
        if($new->image){
            $image_url = public_path('upload/images/news/'). $new->image;
            if(File::exists($image_url)){
                unlink($image_url);
            }
        }
        News::where('id', $new->id)->delete();
        return redirect()->route('admin.news.index');
    }

    public function search(Request $request){
        $search = Str::slug(($request->input('s')));
        // dd($search);
        if($search == ''){
            return redirect()->route('admin.news.index');
        }else {
            $menus = Menu::all();
            $news = News::where('slug', 'like', '%'. $search . '%')->orderBY(DB::raw('ISNULL(news.priority), priority'), 'ASC')
            ->orderBy('created_at', 'DESC')->paginate(8);
            $news->appends(['s' => $search]);
            return view('admin.news.search', ['news' => $news, 'menus' => $menus]);
        }
    }

    public function showAllNew($slug) {
        $news = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('slug', $slug)->paginate(20);
        return view('', compact('news'));
    }

}
