<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Profilesekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EkstrakulikulerController extends Controller
{
    //
    public function index(){
        $data['ekstra'] = Ekstrakulikuler::all();
        $prefix = Auth::user()->level;
        return view($prefix.'.dataExtrakulikuler',$data);
    }
    public function add(){
        $prefix = Auth::user()->level;
        return view($prefix.'.addExtra');
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
    $prefix = Auth::user()->level;
    return redirect()->route($prefix.'.ekstrakulikuler')->with('success', 'Data berhasil ditambah');
}

    public function delete (string $id){
        $id = Crypt::decrypt($id);
        $ekstra = Ekstrakulikuler::find($id);
        $ekstra->delete();
        $prefix = Auth::user()->level;
        return redirect()->route($prefix.'.ekstrakulikuler')->with('success', 'Data ekstrakulikuler berhasil dihapus!');
    }
    public function edit ($id){
        $id = Crypt::decrypt($id);
        $ekstra = Ekstrakulikuler::find($id);
        $prefix = Auth::user()->level;
        return view($prefix.'.editExtra', compact('ekstra'));
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
    $prefix = Auth::user()->level;
    return redirect()->route($prefix.'.ekstrakulikuler')->with('success', 'Data berhasil diubah');
}
//user
public function user(){
    $sekolah = Profilesekolah::first();
    $ekstras = Ekstrakulikuler::all();
    $totalEkstra = $ekstras->count();
    return view('user.eksul',compact('sekolah','ekstras','totalEkstra'));
}
}
