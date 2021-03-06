<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Rules\Required;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $promotions = Promotion::orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')->paginate(8);
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
        $request->validate([
            'fullname' => new Required,
            'tel' => new Required,
        ]);
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
        $request->validate([
            'fullname' => new Required,
            'tel' => new Required,
        ]);
        $promotion = new Promotion();
        $promotion->fullname = $request->input('fullname');
        $promotion->tel = $request->input('tel');
        $promotion->description = $request->input('description');
        $promotion->status = false;
        $promotion->save();

        Alert::success('Th??nh c??ng', 'B???n ???? ????ng k?? t?? v???n th??nh c??ng');
        return redirect()->back();
    }

    public function classify($type)
    {
        $promotions = Promotion::where('status', $type)->orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')->paginate(8);
        return view('admin.promotion.classify')->with('promotions', $promotions)->with('type', $type);
    }

    public function search(Request $request){
        $search = $request->input('s');
        if($search == ''){
            return redirect()->route('admin.promotion.index');
        }else {
            $promotions = Promotion::where('fullname', 'like', '%'.$search.'%')
            ->orWhere('tel', 'like', '%'.$search.'%')
            ->orderBy(DB::raw('ISNULL(created_at), created_at'), 'DESC')
            ->paginate(8);
            $promotions->appends(['s' => $search]);
            return view('admin.promotion.search')->with('promotions', $promotions);
        }
    }
}
