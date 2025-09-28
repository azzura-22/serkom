<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Models\Guru;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminController::class,'login'])->name('login');
Route::post('/login',[AdminController::class,'Auth'])->name('login.auth');
Route::middleware(['admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'Index'])->name('admin');
    Route::get('/admin/guru',[AdminController::class,'guru'])->name('admin.guru');
    Route::get('/admin/guru/add',[GuruController::class , 'addguru'])->name('admin.addguru');
    Route::post('/admin/guru/store',[GuruController::class , 'store'])->name('admin.storeguru');
    Route::get('admin/guru/edit/{id}',[GuruController::class , 'edit'])->name('admin.editguru');
    Route::post('/admin/guru/update/{id}',[GuruController::class,'update'])->name('admin.updateguru');
    Route::get('/admin/guru/delete/{id}',[GuruController::class,'delete'])->name('guru.delete');

    //siswa
    Route::get('/admin/siswa',[SiswaController::class,'datasiswa'])->name('admin.siswa');
    Route::get('/admin/siswa/add',[SiswaController::class,'addsiswa'])->name('admin.addsiswa');
    Route::post('/admin/siswa/store',[SiswaController::class,'storesiswa'])->name('admin.storesiswa');
    Route::get('/admin/siswa/delete/{id}',[SiswaController::class,'delete'])->name('siswa.delete');
    Route::get('/admin/siswa/edit/{id}',[SiswaController::class,'edit'])->name('admin.editsiswa');
    Route::post('/admin/siswa/update/{id}',[SiswaController::class,'update'])->name('admin.updatesiswa');
});
