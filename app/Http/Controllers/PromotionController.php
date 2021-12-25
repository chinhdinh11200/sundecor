<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotion.index')->with('promotions', $promotions);
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
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        // dd($promotion);
        return view('admin.promotion.edit')->with('promotion', $promotion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $promotion->fullname = $request->input('fullname');
        $promotion->tel = $request->input('tel');
        $promotion->description = $request->input('description');
        $promotion->status =  $request->input('status');
        $promotion->update();
        return redirect()->route('admin.promotion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotion.index');
    }


    public function registerPromotion(Request $request) {
        $promotion = new Promotion();
        $promotion->fullname = $request->input('fullname');
        $promotion->tel = $request->input('tel');
        $promotion->description = $request->input('description');
        $promotion->status = false;
        $promotion->save();

        Alert::success('Thành công', 'Bạn đã đăng kí tư vấn thành công');
        return redirect()->back();
    }

}
