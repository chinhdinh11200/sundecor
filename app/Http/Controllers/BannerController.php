<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = DB::table('slides')->select('slides.*')->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->get();
        // dd($slides);
        return view('admin.banner.index')->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide_check = Slide::where('priority', $request->input('priority'))->first();
        if($slide_check){
            $slide_check->priority = null;
            $slide_check->update();
        }
        $slide = new Slide();
        if($request->hasFile('image')){
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/images/slides'), $image);
            $slide->image = $image;
        }
        $slide->title = $request->input('title');
        $slide->link = $request->input('link');
        $slide->status = $request->input('status');
        $slide->priority = $request->input('priority');

        $slide->save();

        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);

        return view('admin.banner.edit')->with('slide', $slide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide_check = Slide::where('priority', $request->input('priority'))->first();
        if($slide_check){
            $slide_check->priority = null;
            $slide_check->update();
        }

        $slide_update = Slide::find($id);

        if($request->hasFile('image')){
            $image = time() . '.' . $request->image->extension();
            if(File::exists(public_path('upload/images/slides/'). $slide_update->image)){
                unlink(public_path('upload/images/slides/'). $slide_update->image);
            }
            $request->image->move(public_path('upload/images/slides'), $image);
            $slide_update->image = $image;
        }

        $slide_update->link = $request->input('link');
        $slide_update->title = $request->input('title');
        $slide_update->status = $request->input('status');
        $slide_update->priority = $request->input('priority');

        $slide_update->update();

        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide_delete = Slide::find($id);
        if(File::exists(public_path('upload/images/slides/'). $slide_delete->image)){
            unlink(public_path('upload/images/slides/'). $slide_delete->image);
        }
        $slide_delete->delete();
        return redirect()->route('admin.banner.index');
    }
}
