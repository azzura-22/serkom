<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Profilesekolah;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GuruController extends Controller
{
    //
    public function addguru(){
        $prefix = Auth::user()->level;
        return view($prefix.'.addguru');
    }
   public function store(Request $request)
    {
        $request->validate([
            'name_guru' => 'required',
            'nip'       => 'required|unique:gurus,nip',
            'mapel'     => 'required',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . '-' . $request->name_guru . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('fotoguru', $filename, 'public');
        } else {
            $filename = null;
        }

        Guru::create([
            'name_guru' => $request->name_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $filename,
        ]);
        $prefix = Auth::user()->level;
        return redirect()->route($prefix.'.guru')->with('success', 'Data guru berhasil ditambahkan!');
    }
    public function edit ($id){
        $id = Crypt::decrypt($id);
        $guru = Guru::find($id);
        $prefix = Auth::user()->level;
        return view($prefix.'.editguru', compact('guru'));
    }
    public function update (Request $request,string $id){
        $request->validate([
            'name_guru' => 'required',
            'nip'       => 'required|unique:gurus,nip,'.$id,
            'mapel'     => 'required',
            'foto'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $guru = Guru::find($id);
        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . '-' . $request->name_guru . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('fotoguru', $filename, 'public');
        } else {
            $filename = $guru->foto;
        }
        $guru->update([
            'name_guru' => $request->name_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $filename,
        ]);
        $prefix = Auth::user()->level;
        return redirect()->route($prefix.'.guru')->with('success', 'Data guru berhasil diupdate!');
    }
    public function delete (string $id){
        $id = Crypt::decrypt($id);
        $guru = Guru::find($id);
        $guru->delete();
        $prefix = Auth::user()->level;
        return redirect()->route($prefix.'.guru')->with('success', 'Data guru berhasil dihapus!');
    }
    //user
    public function index(Request $request)
    {
        $query = Guru::orderBy('name_guru');

        if ($request->has('mapel') && $request->mapel != 'all') {
            $query->where('mapel', $request->mapel);
        }

        $gurus = $query->get();
        $mapelList = Guru::pluck('mapel')->sort();
        $totalGurus = Guru::count();
        $sekolah = Profilesekolah::first();


        return view('user.guru', compact('gurus', 'mapelList', 'totalGurus', 'sekolah'));
    }
}

