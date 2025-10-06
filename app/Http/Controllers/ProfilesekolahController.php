<?php

namespace App\Http\Controllers;

use App\Models\Profilesekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ProfilesekolahController extends Controller
{

    public function index(){
        $sekolah = Profilesekolah::first();
       return view('admin.dataprofile',compact('sekolah'));
    }
    public function edit($id){
        $id = Crypt::decrypt($id);
        $sekolah = Profilesekolah::find($id);
       return view('admin.editProfile',compact('sekolah'));
    }
    public function update(Request $request , string $id){
        $id = Crypt::decrypt($id);
        $sekolah = Profilesekolah::find($id);
        $request->validate([
            'name_sekolah'      => 'required|string|max:255',
            'kepalasekolah'     => 'required|string|max:255',
            'npsn'              => 'required|string|max:20',
            'alamat'            => 'required|string',
            'kontak'            => 'required|string|max:50',
            'visi_misi'         => 'required|string',
            'tahun_berdiri'     => 'required|string|max:10',
            'deskripsi'         => 'required|string',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'logo'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'Fotokepalasekolah' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $fotoName   = $sekolah->foto;
        $logoName   = $sekolah->logo;
        $kepsekName = $sekolah->Fotokepalasekolah;
        if ($request->hasFile('foto')) {
            if ($sekolah->foto && Storage::exists('public/sekolah/'.$sekolah->foto)) {
                Storage::delete('public/sekolah/'.$sekolah->foto);
            }
            $fotoName = time().'_foto.'.$request->foto->extension();
            $request->foto->storeAs('public/sekolah', $fotoName);
        }

        // handle upload logo sekolah
        if ($request->hasFile('logo')) {
            if ($sekolah->logo && Storage::exists('public/sekolah/'.$sekolah->logo)) {
                Storage::delete('public/sekolah/'.$sekolah->logo);
            }
            $logoName = time().'_logo.'.$request->logo->extension();
            $request->logo->storeAs('public/sekolah', $logoName);
        }

        if ($request->hasFile('Fotokepalasekolah')) {
            if ($sekolah->Fotokepalasekolah && Storage::exists('public/sekolah/'.$sekolah->Fotokepalasekolah)) {
                Storage::delete('public/sekolah/'.$sekolah->Fotokepalasekolah);
            }
            $kepsekName = time().'_kepsek.'.$request->Fotokepalasekolah->extension();
            $request->Fotokepalasekolah->storeAs('public/sekolah', $kepsekName);
        }

        $sekolah->update([
            'name_sekolah'      => $request->name_sekolah,
            'kepalasekolah'     => $request->kepalasekolah,
            'npsn'              => $request->npsn,
            'alamat'            => $request->alamat,
            'kontak'            => $request->kontak,
            'visi_misi'         => $request->visi_misi,
            'tahun_berdiri'     => $request->tahun_berdiri,
            'deskripsi'         => $request->deskripsi,
            'foto'              => $fotoName,
            'logo'              => $logoName,
            'Fotokepalasekolah' => $kepsekName
        ]);
        return redirect()->route('admin.profile')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
