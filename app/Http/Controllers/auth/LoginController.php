<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' =>  'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::check() && Auth::user()->level_id == 1) {
                return redirect('/dashboard');
            } else {
                return redirect('/dashboard');
            }
        } else {
            return redirect('/login')->with('message-danger', 'Email atau Password Anda Salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('message-success', 'Anda Berhasil Logout!');
    }
}
