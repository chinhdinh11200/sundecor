<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menutype;
use App\Models\User;
use App\Models\WebInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::guard('admin')->user()){
            $webInfo = WebInfo::first();
            return view('admin.admin')->with('webInfo', $webInfo);
        }else {
            return view('admin.login');
        }
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

    public function changepassword(Request $request) {
        // dd($request);
        if ($request->getMethod() == 'GET') {
            return view('admin.changepassword');
        }

        $user = User::first();
        $pass = $user->password;
        if(Hash::check($request->input('password'), $user->password)) {
            $user->password = Hash::make($request->input('newpassword'));
            $user->update();
            return redirect()->route('admin.quantri');
        }else {
            Alert::error("Lỗi", "Mật khẩu cũ không chính xác");
            return back();
        }
    }
}
