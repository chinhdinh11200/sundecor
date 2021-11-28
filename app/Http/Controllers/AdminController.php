<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menutype;

class AdminController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    }

    public function login()
    {
        $menutype = Menutype::all();
        if(count($menutype)!=4){
            for($i=0; $i<4; $i++){
                $menutype = new Menutype();
                if($i==0)
                    $menutype->name = "Menu top";
                if($i==1)
                    $menutype->name = "Menu chính";
                if($i==2)
                    $menutype->name = "Menu chân trang";
                if($i==3)
                    $menutype->name = "Menu khác";
                $menutype->save();
            }
        }
    }
}
