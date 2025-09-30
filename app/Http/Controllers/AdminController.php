<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $data['guru']=Guru::all();
        $data['siswa']=Siswa::all();
        $data['eks']=Ekstrakulikuler::all();
        $data['galeri']=Galeri::all();
        return view("admin.halaman",$data);
    }
    public function guru(){
        $data['guru'] = Guru::all();
        return view('admin.dataguru',$data);
    }
    public function login(){
        return view('login');
    }
    public function Auth (Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->level == 'admin') {
                return redirect()->route('admin');
            } else {
                return redirect()->back();
            }
        }
    }
    public function logout () {
        Auth::logout();
        return redirect()->route('login');
    }
}
