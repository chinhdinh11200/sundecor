<?php

namespace App\Http\Controllers;

use App\Models\Supporter;
use App\Rules\Required;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supporters = Supporter::orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->paginate(8);
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
            'fullname' => [new Required],
            'tel' => [new Required],
        ]);
        $supporter_check = Supporter::where('priority', $request->input('priority'))->first();
        if($supporter_check){
            $supporter_check->priority = null;
            $supporter_check->update();
        }

        $image_url = '';
        if($request->hasFile('image')){
            $image_url = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/images/supporter'), $image_url);
        }

        $supporter = new Supporter();
        $supporter->fullname =  $request->input('fullname');
        $supporter->tel =  $request->input('tel');
        $supporter->priority =  $request->input('priority');
        $supporter->status =  $request->input('status');
        $supporter->image =  $image_url;
        $supporter->save();

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
        $supporter_check = Supporter::where('priority', $request->input('priority'))->first();
        if($supporter_check){
            $supporter_check->priority = null;
            $supporter_check->update();
        }

        if($supporter->priority != $request->input('priority')){
            $request->validate([
                'priority' => 'unique:supporters,priority'
            ]);
        }

        $image_url = '';
        if($request->hasFile('image')){
            if($supporter->image) {
                if(File::exists(public_path('upload/images/supporter/'). $supporter->image)){
                    unlink(public_path('upload/images/supporter/'). $supporter->image);
                }
            }
            $image_url = time() . '.'. $request->image->extension();
            $request->image->move(public_path('upload/images/supporter'), $image_url);
        }

        if($image_url){
            Supporter::where('id', $supporter->id)->update([
                'fullname' => $request->input('fullname'),
                'tel' => $request->input('tel'),
                'priority' => $request->input('priority'),
                'status' => $request->input('status') == "1" ? true : false,
                'image' => $image_url,
            ]);
        }else {
            Supporter::where('id', $supporter->id)->update([
                'fullname' => $request->input('fullname'),
                'tel' => $request->input('tel'),
                'priority' => $request->input('priority'),
                'status' => $request->input('status') == "1" ? true : false,
                'image' => $supporter->image,
            ]);
        }

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
        if($data->image){
            $image_url = public_path('upload/images/supporter').'/'.$data->image;
            if(File::exists($image_url)){
                unlink($image_url);
            }
        }
        Supporter::where('id', $supporter->id)->delete();

        return redirect()->route('admin.supporter.index');
    }
}
