<?php

namespace App\Http\Controllers;

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
}
