<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminController::class,'login'])->name('login');
Route::post('/login',[AdminController::class,'Auth'])->name('login.auth');
Route::middleware(['admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'Index'])->name('admin');
    Route::get('/admin/guru',[AdminController::class,'guru'])->name('admin.guru');
    Route::get('/admin/guru/add',[GuruController::class , 'addguru'])->name('admin.addguru');
    Route::post('/admin/guru/store',[GuruController::class , 'store'])->name('admin.storeguru');
});
