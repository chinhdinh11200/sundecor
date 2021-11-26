<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
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
        $image_url = time() . '-' . $request->input('title') .'.'. $request->image->extension();

        $request->image->move(public_path('backend/images/video'), $image_url);
        Video::create([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status'),
            'image_url' => $image_url
        ]);
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
        $image_url = $request->image && time() . '-' . $request->input('title') .'.'. $request->image->extension(); // : $video->image_url;

        $request->image && $request->image->move(public_path('backend/images/video'), $image_url);
        Video::where('id', $video->id)->update([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status'),
            'image_url' => $image_url
        ]);
        
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
        $image_url = public_path('backend/images/video').'/'.$data->image_url;
        unlink($image_url);
        Video::where('id', $video->id)->delete();
        return redirect()->route('admin.video.index');
    }
}
