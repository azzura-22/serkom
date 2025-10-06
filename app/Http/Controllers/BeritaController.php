<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    //
    public function index()
{
    $berita = Berita::with('user')->latest()->get();
    return view('admin.databerita', compact('berita'));
}

public function show($id)
{
    $berita = Berita::with('user')->findOrFail($id);
    return view('admin.detailberita', compact('berita'));
}
public function add(){
    $user = User::all();
    return view('admin.addberita',compact('user'));
}
public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'tanggal' => 'required|date',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'user_id' => 'required'
    ]);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = time() . '-' . $request->judul . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('berita', $filename, 'public');
    } else {
        $filename = null;
    }

    Berita::create([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'tanggal' => $request->tanggal,
        'gambar' => $filename,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('admin.berita')->with('success', 'Data berita berhasil ditambahkan.');
}
public function delete($id){
    $berita = Berita::find($id);
    $berita->delete();
    return redirect()->route('admin.berita');
}
public function edit($id)
{
    $berita = Berita::findOrFail($id);
    $users = User::all();
    return view('admin.editberita', compact('berita', 'users'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'tanggal' => 'required|date',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'user_id' => 'required|exists:users,id',
    ]);

    $berita = Berita::findOrFail($id);

    $data = [
        'judul' => $request->judul,
        'isi' => $request->isi,
        'tanggal' => $request->tanggal,
        'user_id' => $request->user_id,
    ];

    if ($request->hasFile('gambar')) {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $file = $request->file('gambar');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('berita', $filename, 'public');

        $data['gambar'] = $filename;
    }

    $berita->update($data);

    return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui.');
}

//user
public function berita(){
    $data['berita'] = Berita::all();
    return view('user.berita',$data);
}
public function detailberita($id){
    $data['berita']= Berita::find($id);
    return view('user.beritaDetail',$data);
}
}
