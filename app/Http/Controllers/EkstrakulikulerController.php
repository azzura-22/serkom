<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EkstrakulikulerController extends Controller
{
    //
    public function index(){
        $data['ekstra'] = Ekstrakulikuler::all();
        return view('admin.dataExtrakulikuler',$data);
    }
    public function add(){
        return view('admin.addExtra');
    }
    public function store(Request $request)
{
    $request->validate([
        'name_ekstra' => 'required',
        'pembina' => 'required',
        'jadwal_latihan' => 'required',
        'deksripsi' => 'required',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $gambar   = $request->file('gambar');
        $filename = time() . '-' . $request->name_ekstra . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('fotoextra', $filename, 'public');
    } else {
        $filename = null;
    }

    Ekstrakulikuler::create([
        'name_ekstra' => $request->name_ekstra,
        'pembina' => $request->pembina,
        'jadwal_latihan' => $request->jadwal_latihan,
        'deksripsi' => $request->deksripsi,
        'gambar' => $filename,
    ]);

    return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data berhasil ditambah');
}

    public function delete (string $id){
        $id = Crypt::decrypt($id);
        $ekstra = Ekstrakulikuler::find($id);
        $ekstra->delete();
        return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data ekstrakulikuler berhasil dihapus!');
    }
    public function edit ($id){
        $id = Crypt::decrypt($id);
        $ekstra = Ekstrakulikuler::find($id);
        return view('admin.editExtra', compact('ekstra'));
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'name_ekstra' => 'required',
        'pembina' => 'required',
        'jadwal_latihan' => 'required',
        'deksripsi' => 'required',
        'gambar' => 'nullable|image'
    ]);

    $extra = Ekstrakulikuler::find($id);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = time() . '-' . $request->name_ekstra . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('fotoguru', $filename, 'public');
    } else {
        $filename = $extra->gambar;
    }

    $extra->update([
        'name_ekstra' => $request->name_ekstra,
        'pembina' => $request->pembina,
        'jadwal_latihan' => $request->jadwal_latihan,
        'deksripsi' => $request->deksripsi,
        'gambar' => $filename,
    ]);

    return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data berhasil diubah');
}
}
