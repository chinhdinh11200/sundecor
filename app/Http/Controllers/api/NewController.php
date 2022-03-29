<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $new_exist = News::where('name', $request->input('cloneNews')['name'])
                        ->where('menu_id', $request->input('cloneNews')['subcategory_id'])->first();
        if(!$new_exist){
            $new = new News();
            $new->name = $request->input('cloneNews')['name'];
            $new->keyword = $request->input('cloneNews')['name'];
            $new->slug = Str::slug($request->input('cloneNews')['name']). '.html';
            $new->title = $request->input('cloneNews')['title'];
            $new->description = $request->input('cloneNews')['description'];
            $new->content = $request->input('cloneNews')['content'];
            $new->priority = $request->input('cloneNews')['priority'];
            $new->menu_id = $request->input('cloneNews')['subcategory_id'];
            $url = $request->input('cloneNews')['image'];
            $contents = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $name = Str::slug(pathinfo($url, PATHINFO_FILENAME)) . '.' . $extension;
            $new->image = $name;
            Storage::disk('public')->put($name, $contents);
            $new->status = true;
            $new->save();
            return 200;
        }else {
            $new_exist->name = $request->input('cloneNews')['name'];
            $new_exist->keyword = $request->input('cloneNews')['name'];
            $new_exist->slug = Str::slug($request->input('cloneNews')['name']). '.html';
            $new_exist->title = $request->input('cloneNews')['title'];
            $new_exist->description = $request->input('cloneNews')['description'];
            $new_exist->content = $request->input('cloneNews')['content'];
            $new_exist->status = true;
            $new_exist->menu_id = $request->input('cloneNews')['subcategory_id'];
            $url = $request->input('cloneNews')['image'];
            $contents = file_get_contents($url);
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $name = Str::slug(pathinfo($url, PATHINFO_FILENAME)) . '.' . $extension;
            $new_exist->image = $name;
            Storage::disk('public')->put($name, $contents);
            if(!$request->input('cloneNews')['priority']){
                $new_exist->priority = null;
            }else {
                $new_exist->priority = $request->input('cloneNews')['priority'];
            }
            $new_exist->update();
            return 201;
        }
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
