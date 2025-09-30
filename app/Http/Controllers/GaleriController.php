<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    //
    public function index(){
        $data['galeri']= Galeri::all();
        return view('admin.datagaleri',$data);
    }
    public function add(){
        return view('admin.addgaleri');
    }
    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'keterangan' => 'required|string',
        'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480',
        'kategori' => 'required|in:foto,vidio',
        'tanggal' => 'required|date',
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('galeri', $filename, 'public');
    }

    Galeri::create([
        'judul' => $request->judul,
        'keterangan' => $request->keterangan,
        'file' => $filename,
        'kategori' => $request->kategori,
        'tanggal' => $request->tanggal,
    ]);

    return redirect()->route('admin.galeri')->with('success', 'Data galeri berhasil ditambahkan.');
}

public function delete($id){
    $id = Crypt::decrypt($id);
    $galeri = Galeri::find($id);
    $galeri->delete();
    return redirect()->route('admin.galeri');
}

}
