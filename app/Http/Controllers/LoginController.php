<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $webInfo = WebInfo::first();
            return view('admin.login', compact('webInfo'));
        }

        $credentials = $request->only(['username', 'password']);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.quantri');
        } else {
            return redirect()->back()->withErrors(['error' => 'Sai tên đăng nhập hoặc mật khẩu']);
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    public function registerauth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'username' => $request->input('username'),
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        dd($user);
        return 200;
    }
}
