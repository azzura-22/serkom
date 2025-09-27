<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function addguru(){
        return view('admin.addguru');
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

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil ditambahkan!');
    }
}

