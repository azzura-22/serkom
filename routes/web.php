<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin',[AdminController::class,'Index'])->name('admin');
Route::get('/admin/guru',[AdminController::class,'guru'])->name('admin.guru');
Route::get('/login',[AdminController::class,'login'])->name('login');
