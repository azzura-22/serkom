<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    //
    public function datasiswa(){
        $data['siswa'] = Siswa::all();
        return view('admin.datasiswa',$data);
    }
    public function addsiswa(){
        return view('admin.addsiswa');
    }
    public function storesiswa(Request $request){
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required',
        ]);
        Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);
        return redirect()->route('admin.siswa')->with('success','Data Berhasil Ditambahkan');
    }
    public function delete (string $id){
        $id = Crypt::decrypt($id);
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('admin.siswa')->with('success', 'Data guru berhasil dihapus!');
    }
    public function edit ($id){
        $id = Crypt::decrypt($id);
        $siswa = Siswa::find($id);
        return view('admin.editsiswa', compact('siswa'));
    }
    public function update (Request $request,string $id){
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required',
        ]);
        $siswa = Siswa::find($id);
        $siswa->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);
        return redirect()->route('admin.siswa')->with('success','Data Berhasil Diubah');
    }
}
