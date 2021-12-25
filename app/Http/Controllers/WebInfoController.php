<?php

namespace App\Http\Controllers;

use App\Models\WebInfo;
use Illuminate\Http\Request;

class WebInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
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
        //
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
