<?php

namespace App\Http\Controllers;

use App\Models\WebInfo;
use App\Rules\Required;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webInfo = WebInfo::first();
        return view('admin.admin')->with('webInfo', $webInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $request->validate([
            'receiveEmail' => [new Required],
            'tel1' => [new Required],
            'tel2' => [new Required],
            'hotline' => [new Required],
            'facebook' => [new Required],
            'reason' => [new Required],
            'promotion' => [new Required],
            'tutorial' => [new Required],
            'address' => [new Required],
        ]);
        $webInfo = WebInfo::first();
        if($webInfo){
            DB::table('web_infos')
                ->where('id', $webInfo->id)
                ->update([
                'receiveEmail' => $request->input('receiveEmail'),
                'tel1' => $request->input('tel1'),
                'tel2' => $request->input('tel2'),
                'hotline' => $request->input('hotline'),
                'facebook' => $request->input('facebook'),
                'reason' => $request->input('reason'),
                'promotion' => $request->input('promotion'),
                'tutorial' => $request->input('tutorial'),
                'address' => $request->input('address'),
            ]);
        }else {
            DB::table('web_infos')->insert([
                'receiveEmail' => $request->input('receiveEmail'),
                'tel1' => $request->input('tel1'),
                'tel2' => $request->input('tel2'),
                'hotline' => $request->input('hotline'),
                'facebook' => $request->input('facebook'),
                'reason' => $request->input('reason'),
                'promotion' => $request->input('promotion'),
                'tutorial' => $request->input('tutorial'),
                'address' => $request->input('address'),
            ]);
        }
        return redirect()->route('admin.webinfo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function show(WebInfo $webInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(WebInfo $webInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebInfo $webInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebInfo $webInfo)
    {
        //
    }
}
