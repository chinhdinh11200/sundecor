<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::paginate(8);
        return view('admin.consultation.index')->with('consultations', $consultations);
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
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        return view('admin.consultation.edit')->with('consultation', $consultation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        $consultation->fullname = $request->input('fullname');
        $consultation->tel = $request->input('tel');
        $consultation->description = $request->input('description');
        $consultation->status =  $request->input('status');
        $consultation->update();
        return redirect()->route('admin.consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return redirect()->route('admin.consultation.index');
    }

    public function registerConsultation(Request $request) {
        // dd(url()->previous());
        $consultation = new Consultation();
        $consultation->fullname = $request->input('fullname');
        $consultation->tel = $request->input('tel');
        $consultation->description = $request->input('description');
        $consultation->status = false;
        $consultation->save();

        Alert::success('Chúc mừng', 'Bạn đã nhận khuyến mãi thành công')->persistent('Ok');

        return redirect(url()->previous());
        return back();
    }

    public function classify($type)
    {
        $consultations = Consultation::where('status', $type)->paginate(8);
        return view('admin.consultation.classify')->with('consultations', $consultations)->with('type', $type);
    }

    public function search(Request $request){
        $search = $request->input('s');
        if($search == ''){
            return redirect()->route('admin.consultation.index');
        }else {
            $consultations = Consultation::where('fullname', 'like', '%'.$search.'%')
            ->orWhere('tel', 'like', '%'.$search.'%')
            ->paginate(8);
            $consultations->appends(['s' => $search]);
            return view('admin.consultation.index')->with('consultations', $consultations);
        }
    }
}
