<?php

namespace App\Http\Controllers;

use App\Models\Supporter;
use Illuminate\Http\Request;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supporters = Supporter::select()->orderBy('priority')->get();
        return view('admin.supporter.index', ['supporters' => $supporters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supporter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|unique:supporters,fullname',
            'tel' => 'required|min:1|max:10'
        ]);

        $image_url = time() . '-' . $request->input('fullname') . '.' . $request->image->extension();
        $request->image->move(public_path('backend/images/supporter'), $image_url);

        Supporter::create([
            'fullname' => $request->input('fullname'),
            'tel' => $request->input('tel'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status') == "1" ? true : false,
            'image_url' => $image_url
        ]);

        return redirect()->route('admin.supporter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function show(Supporter $supporter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function edit(Supporter $supporter)
    {
        return view('admin.supporter.edit', ["supporter" => $supporter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supporter $supporter)
    {
        $image_url = $request->image && time() . '-' . $request->input('fullname') .'.'. $request->image->extension() ; //: $supporter->image_url;
        $request->image && $request->image->move(public_path('backend/images/supporter'), $image_url);

        $supportered = Supporter::where('id', $supporter->id)->update([
            'fullname' => $request->input('fullname'),
            'tel' => $request->input('tel'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status') == "1" ? true : false,
            'image_url' => $image_url,
        ]);

        return redirect()->route('admin.supporter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supporter $supporter)
    {
        $data = Supporter::find($supporter->id);
        $image_url = public_path('backend/images/supporter').'/'.$data->image_url;
        unlink($image_url);
        Supporter::where('id', $supporter->id)->delete();

        return redirect()->route('admin.supporter.index');
    }
}
