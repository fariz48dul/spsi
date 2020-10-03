<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\User;
use App\Level;


class UserController extends Controller
{
    //

    public function index()
    {
        $user = User::all();
        $level = Level::all();

        return view('user.user', compact('user', 'level'));
    }

    public function adduser()
    {
        $user = User::all();
        $level = Level::all();

        return view('user.addUser', compact('user', 'level'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'unique:users|email',
            'tanggal_lahir' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_level = 2;

        $user->save();

        return redirect('/user')->with('message-success', 'Data Berhasil Di Input!');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $level = Level::all();

        return view('user.editUser', compact('user', 'level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'tanggal_lahir' => 'required',
            'password' => ['required', new MatchOldPassword],
            // 'password' => 'min:8|confirmed',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->plant = $request->plant;
        $user->bagian = $request->bagian;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->agama = $request->agama;
        $user->alamat = $request->alamat;
        $user->status = $request->status;

        $user->save();

        return redirect('/user')->with('message-success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        if ($user) {
            return redirect()->back()->with('message-success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal dihapus');
        }
    }
}
