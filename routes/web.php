<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilesekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\admin;
use App\Models\Guru;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

    //ekstrakulikulers
    Route::get('/admin/ekstrakulikuler',[EkstrakulikulerController::class,'index'])->name('admin.ekstrakulikuler');
    Route::get('/admin/ekstrakulikuler/add',[EkstrakulikulerController::class,'add'])->name('admin.addekstrakulikuler');
    Route::post('/admin/ekstrakulikuler/store',[EkstrakulikulerController::class,'store'])->name('admin.storeekstrakulikuler');
    Route::get('/admin/ekstrakulikuler/delete/{id}',[EkstrakulikulerController::class,'delete'])->name('ekstra.delete');
    Route::get('/admin/ekstrakulikuler/edit/{id}',[EkstrakulikulerController::class,'edit'])->name('admin.editekstrakulikuler');
    Route::post('/admin/extrakulikuler/update/{id}',[EkstrakulikulerController::class,'update'])->name('admin.ekstraupdate');

    //Galeri
    Route::get('/admin/galeri',[GaleriController::class,'index'])->name('admin.galeri');
    Route::get('/admin/galeri/add',[GaleriController::class,'add'])->name('admin.addgaleri');
    Route::post('/admin/galeri/store',[GaleriController::class,'store'])->name('admin.storegaleri');
    Route::get('/admin/galeri/delete/{id}',[GaleriController::class,'delete'])->name('admin.deletegaleri');

    //berita
    Route::get('/admin/berita',[BeritaController::class,'index'])->name('admin.berita');
    Route::get('/admin/berita/add',[BeritaController::class,'add'])->name('admin.berita.add');
    Route::post('/admin/berrita/store',[BeritaController::class,'store'])->name('admin.berita.store');
    Route::get('/admin/berita/detail/{id}',[BeritaController::class,'show'])->name('admin.berita.show');
    Route::get('/admin/berita/delete/{id}',[BeritaController::class,'delete'])->name('admin.berita.delete');
    Route::get('/admin/berita/edit/{id}',[BeritaController::class,'edit'])->name('admin.berita.edit');
    Route::post('/admin/berita/update/{id}',[BeritaController::class,'update'])->name('admin.berita.update');

    Route::get('/admin/profile',[ProfilesekolahController::class,'index'])->name('admin.profile');
    Route::get('/admin/profile/add',[ProfilesekolahController::class,'add'])->name('admin.profile.add');
    Route::post('/admin/profile/store',[ProfilesekolahController::class,'store'])->name('admin.profile.store');
    Route::get('/admin/profile/delete/{id}',[ProfilesekolahController::class,'delete'])->name('admin.profile.delete');
    Route::get('/admin/profile/edit/{id}',[ProfilesekolahController::class,'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update/{id}',[ProfilesekolahController::class,'update'])->name('admin.profile.update');

    //user
    Route::get('/admin/user',[UserController::class,'user'])->name('admin.user');
    Route::get('/admin/add/user',[UserController::class,'add'])->name('admin.adduser');
    Route::post('/admin/user/create',[UserController::class,'store'])->name('admin.storeuser');
    Route::get('/admin/user/edit/{id}',[UserController::class,'edit'])->name('admin.edit.user');
    Route::post('/admin/user/update/{id}',[UserController::class,'update'])->name('admin.user.update');
    Route::get('/admin/delete/user/{id}',[UserController::class,'delete'])->name('admin.delete.user');

    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
});
//user
Route::get('/user',[UserController::class,'home'])->name('user');
Route::get('/user/berita',[BeritaController::class,'berita'])->name('berita');
Route::get('/user/berita/{id}',[BeritaController::class,'detailberita'])->name('detail.berita');
Route::get('/user/profile',[UserController::class,'show'])->name('profile');
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
