<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view("admin.halaman");
    }
    public function guru(){
        return view('admin.dataguru');
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
}
