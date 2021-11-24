<?php

namespace App\Http\Controllers;

use App\Models\Supporter;
use Illuminate\Http\Request;

class SupporterController extends Controller
{
    function cmp ($a, $b) {
        return $a->priority > $b->priority ? 1 : -1;
    }
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

        // dd($request->input('status'));
        $supportered = Supporter::where('id', $supporter->id)->update([
            'fullname' => $request->input('fullname'),
            'tel' => $request->input('tel'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status') == "1" ? true : false,
        ]);

        // $supporters = Supporter::select()->orderBy('priority')->get();
        // return view('admin.supporter.index', ['supporters' => $supporters]);
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
        //
    }
}
