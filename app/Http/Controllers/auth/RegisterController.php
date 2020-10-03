<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' =>  'required|min:3',
            'email' =>  'required|email|unique:users',
            'tanggal_lahir' =>  'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->password = Hash::make($request->password);
        $user->id_level = 2;

        if ($user->save()) {
            return redirect('/login')->with('message-success', 'Anda Berhasil Registrasi, Silahkan Login!!');
        } else {
            return redirect()->back()->with('message-danger', 'Anda Gagal Register, Periksa Data Anda Lagi!!');
        }
    }
}
