<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Berita;

class BeritaController extends Controller
{
    //
    public function index()
    {
        $berita = Berita::paginate(5);
        return view('berita.berita', compact('berita'));
    }

    public function addBerita()
    {
        return view('berita.addBerita');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' =>  'required|min:3',
            'deskripsi' =>  'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita = new Berita;

        $image = $request->file('image');
        if ($image) {
            $name = Str::slug($request->title) . $berita->id . '.png';
            $destinationPath = public_path('assets/img/berita');
            $image->move($destinationPath, $name);
        }


        $berita->title = $request->title;
        $berita->deskripsi = $request->deskripsi;
        $berita->image = $name;

        if ($berita->save()) {
            return redirect('/berita')->with('message-success', 'Data berhasi di input!');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal di input!');
        }
    }

    public function editBerita($id)
    {
        $dec = decrypt($id);
        $berita = Berita::find($dec);
        return view('berita.editBerita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>  'required|min:3',
            'deskripsi' =>  'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dec = decrypt($id);
        $berita = Berita::find($dec);

        $image = $request->file('image');
        if ($image) {
            $name = Str::slug($request->title) . $berita->id .  '.png';
            $location = public_path('/assets/img/berita');
            $image->move($location, $name);
            $oldImage = $berita->image;
            Storage::delete($oldImage);
        }

        $berita->title = $request->title;
        $berita->deskripsi = $request->deskripsi;
        $berita->image = $name;

        if ($berita->save()) {
            return redirect('/berita')->with('message-success', 'Data berhasi di ubah!');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal di ubah!');
        }
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        Storage::delete($berita->image);

        $berita->delete();
        if ($berita) {
            return redirect()->back()->with('message-success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal dihapus');
        }
    }
}
