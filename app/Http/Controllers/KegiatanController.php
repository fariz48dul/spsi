<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::paginate(5);
        return view('kegiatan.kegiatan', compact('kegiatan'));
    }

    public function addKegiatan()
    {
        return view('kegiatan.addKegiatan');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' =>  'required|min:3',
            'deskripsi' =>  'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kegiatan = new Kegiatan;

        $image = $request->file('image');
        if ($image) {
            $name = Str::slug($request->title) . $kegiatan->id . '.png';
            $destinationPath = public_path('assets/img/kegiatan');
            $image->move($destinationPath, $name);
        }

        $kegiatan->title = $request->title;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->image = $name;

        if ($kegiatan->save()) {
            return redirect('/kegiatan')->with('message-success', 'Data berhasi di input!');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal di input!');
        }
    }

    public function editKegiatan($id)
    {
        $dec = decrypt($id);
        $kegiatan = Kegiatan::find($dec);
        return view('kegiatan.editKegiatan', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>  'required|min:3',
            'deskripsi' =>  'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dec = decrypt($id);
        $kegiatan = kegiatan::find($dec);

        $image = $request->file('image');
        if ($image) {
            $name = Str::slug($request->title) . $kegiatan->id .  '.png';
            $location = public_path('/assets/img/kegiatan');
            $image->move($location, $name);
            $oldImage = $kegiatan->image;
            Storage::delete($oldImage);
        }

        $kegiatan->title = $request->title;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->image = $name;

        if ($kegiatan->save()) {
            return redirect('/kegiatan')->with('message-success', 'Data berhasi di ubah!');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal di ubah!');
        }
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        Storage::delete($kegiatan->image);

        $kegiatan->delete();
        if ($kegiatan) {
            return redirect()->back()->with('message-success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('message-danger', 'Data gagal dihapus');
        }
    }
}
