<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Profilesekolah;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function home()
{
    $sekolah = Profilesekolah::first();
    $beritas = Berita::latest()->take(3)->get();
    $galeris = Galeri::latest()->take(8)->get();
    $ekskuls = Ekstrakulikuler::all();
    return view('user.home', compact('beritas', 'galeris','ekskuls','sekolah'));
}
}
