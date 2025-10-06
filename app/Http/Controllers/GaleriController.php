<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Profilesekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    //
    public function index(){
        $data['galeri']= Galeri::all();
        $prefix = Auth::user()->level;
        return view($prefix.'.datagaleri',$data);
    }
    public function add(){
        $prefix = Auth::user()->level;
        return view($prefix.'.addgaleri');
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
    $prefix = Auth::user()->level;
    return redirect()->route($prefix.'.galeri')->with('success', 'Data galeri berhasil ditambahkan.');
}

public function delete($id){
    $id = Crypt::decrypt($id);
    $galeri = Galeri::find($id);
    $galeri->delete();
    $prefix = Auth::user()->level;
    return redirect()->route($prefix.'.galeri');
}

//user
public function user (Request $request)
    {
        $query = Galeri::orderBy('tanggal', 'desc');

        // Filter by kategori
        if ($request->has('kategori') && $request->kategori != 'all') {
            $query->where('kategori', $request->kategori);
        }

        $galeris = $query->paginate(12); // 12 item per page
        $totalGaleri = Galeri::count();
        $totalFoto = Galeri::where('kategori', 'foto')->count();
        $totalVideo = Galeri::where('kategori', 'vidio')->count();
        $sekolah = Profilesekolah::first();

        return view('user.galeri', compact('galeris', 'totalGaleri', 'totalFoto', 'totalVideo', 'sekolah'));
    }

}
