<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Profilesekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //
    public function home()
{
    $sekolah = Profilesekolah::first();
    $beritas = Berita::latest()->take(3)->get();
    $galeris = Galeri::latest()->where('kategori','foto')->take(8)->get();
    $jumlahguru = Guru::count();
    $jmsiswa = Siswa::count();
    $jmekskul = Ekstrakulikuler::count();
    $ekskuls = Ekstrakulikuler::latest()->take(3)->get();
    return view('user.home', compact('beritas', 'galeris','ekskuls','sekolah','jumlahguru','jmsiswa','jmekskul'));
}
public function show()
    {
        $profile = ProfileSekolah::first();
        return view('user.profile', compact('profile'));
    }
    public function user(){
        $users = User::all();
        $prefix = Auth::user()->level;
        return view($prefix.'.datauser',compact('users'));
    }
    public function add(){
        return view('admin.adduser');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'username' =>'required',
            'level' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'level'=> $request->level,
            'password'=> bcrypt($request->password)
        ]);
        return redirect()->route('admin.user');
    }
    public function edit ($id){
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        return view('admin.edituser', compact('user'));
    }
    public function update(Request $request, $id){
        $id = Crypt::decrypt($id);
        $request->validate([
            'name' => 'required',
            'username' =>'required',
            'level' => 'required',
            'password' => 'required'
        ]);
        User::find($id)->update([
            'name'=> $request->name,
            'username'=> $request->username,
            'level'=> $request->level,
            'password'=> bcrypt($request->password)
        ]);
        return redirect()->route('admin.user');
    }
    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('admin.user');
    }
}
