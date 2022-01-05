<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->paginate(8);
        return view('admin.video.index')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $video_check = Video::where('priority', $request->input('priority'))->first();
        if($video_check){
            $video_check->priority = null;
            $video_check->update();
        }
        $image_url = "";
        if($request->hasFile('image')){
            $image_url = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/images/video'), $image_url);
        }


        $video = new Video();
        $video->title = $request->input('title');
        $video->link = $request->input('link');
        $video->priority = $request->input('priority');
        $video->status = $request->input('status');
        $video->image = $image_url;

        $video->save();

        return redirect()->route('admin.video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.video.edit')->with('video', $video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $video_check = Video::where('priority', $request->input('priority'))->first();
        if($video_check){
            $video_check->priority = null;
            $video_check->update();
        }
        $image_url = '';
        if($request->hasFile('image')){
            if($video->image) {
                if(File::exists(public_path('upload/images/video/'). $video->image)){
                    unlink(public_path('upload/images/video/'). $video->image);
                }
            }
            $image_url = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/images/video/'), $image_url);
        }

        if($image_url){
            Video::where('id', $video->id)->update([
                'title' => $request->input('title'),
                'link' => $request->input('link'),
                'priority' => $request->input('priority'),
                'status' => $request->input('status'),
                'image' => $image_url
            ]);
        }else {
            Video::where('id', $video->id)->update([
                'title' => $request->input('title'),
                'link' => $request->input('link'),
                'priority' => $request->input('priority'),
                'status' => $request->input('status'),
                'image' => $video->image
            ]);
        }

        return redirect()->route('admin.video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $data = Video::find($video->id);
        $image_url = "";
        if($data->image){
            $image_url = public_path('upload/images/video').'/'. $data->image;
        }
        if(File::exists($image_url)){
            unlink($image_url);
        }
        Video::where('id', $video->id)->delete();
        return redirect()->route('admin.video.index');
    }
}
