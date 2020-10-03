<?php

namespace App\Http\Controllers;

use App\Struktur;

use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()
    {
        $struktur = Struktur::paginate(5);
        return view('struktur.struktur', compact('struktur'));
    }

    public function addStruktur()
    {
        return view('struktur.addStruktur');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' =>  'required|min:3',
            'jabatan' =>  'required',
        ]);

        $struktur = new Struktur;

        $struktur->nama = $request->nama;
        $struktur->jabatan = $request->jabatan;

        if ($struktur->save()) {
            return redirect('/struktur')->with('message-success', 'Data berhasi di input!');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal di input!');
        }
    }

    public function editStruktur($id)
    {
        $dec = decrypt($id);
        $struktur = Struktur::find($dec);
        return view('struktur.editStruktur', compact('struktur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' =>  'required|min:3',
            'jabatan' =>  'required',
        ]);

        $dec = decrypt($id);
        $struktur = Struktur::find($dec);

        $struktur->nama = $request->nama;
        $struktur->jabatan = $request->jabatan;

        if ($struktur->save()) {
            return redirect('/struktur')->with('message-success', 'Data berhasi di ubah!');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal di ubah!');
        }
    }

    public function destroy($id)
    {
        $struktur = Struktur::find($id);

        $struktur->delete();
        if ($struktur) {
            return redirect()->back()->with('message-success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal dihapus');
        }
    }
}
