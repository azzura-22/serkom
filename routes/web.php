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
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/',[AdminController::class,'login'])->name('login');
Route::post('/login',[AdminController::class,'Auth'])->name('login.auth');
Route::middleware(['admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
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

    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
});
Route::middleware(['operator'])->group(function() {

    // Dashboard
    Route::get('/operator', [AdminController::class, 'in'])->name('operator');

    // Guru
    Route::get('/operator/guru', [AdminController::class, 'guru'])->name('operator.guru');
    Route::get('/operator/guru/add', [GuruController::class, 'addguru'])->name('operator.addguru');
    Route::post('/operator/guru/store', [GuruController::class, 'store'])->name('operator.storeguru');
    Route::get('/operator/guru/edit/{id}', [GuruController::class, 'edit'])->name('operator.editguru');
    Route::post('/operator/guru/update/{id}', [GuruController::class, 'update'])->name('operator.updateguru');
    Route::get('/operator/guru/delete/{id}', [GuruController::class, 'delete'])->name('operator.deleteguru');

    // Siswa
    Route::get('/operator/siswa', [SiswaController::class, 'datasiswa'])->name('operator.siswa');
    Route::get('/operator/siswa/add', [SiswaController::class, 'addsiswa'])->name('operator.addsiswa');
    Route::post('/operator/siswa/store', [SiswaController::class, 'storesiswa'])->name('operator.storesiswa');
    Route::get('/operator/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('operator.editsiswa');
    Route::post('/operator/siswa/update/{id}', [SiswaController::class, 'update'])->name('operator.updatesiswa');
    Route::get('/operator/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('operator.deletesiswa');

    // Ekstrakulikuler
    Route::get('/operator/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('operator.ekstrakulikuler');
    Route::get('/operator/ekstrakulikuler/add', [EkstrakulikulerController::class, 'add'])->name('operator.addekstrakulikuler');
    Route::post('/operator/ekstrakulikuler/store', [EkstrakulikulerController::class, 'store'])->name('operator.storeekstrakulikuler');
    Route::get('/operator/ekstrakulikuler/edit/{id}', [EkstrakulikulerController::class, 'edit'])->name('operator.editekstrakulikuler');
    Route::post('/operator/ekstrakulikuler/update/{id}', [EkstrakulikulerController::class, 'update'])->name('operator.updateekstrakulikuler');
    Route::get('/operator/ekstrakulikuler/delete/{id}', [EkstrakulikulerController::class, 'delete'])->name('operator.deleteekstrakulikuler');

    // Galeri
    Route::get('/operator/galeri', [GaleriController::class, 'index'])->name('operator.galeri');
    Route::get('/operator/galeri/add', [GaleriController::class, 'add'])->name('operator.addgaleri');
    Route::post('/operator/galeri/store', [GaleriController::class, 'store'])->name('operator.storegaleri');
    Route::get('/operator/galeri/delete/{id}', [GaleriController::class, 'delete'])->name('operator.deletegaleri');

    // Berita
    Route::get('/operator/berita', [BeritaController::class, 'index'])->name('operator.berita');
    Route::get('/operator/berita/add', [BeritaController::class, 'add'])->name('operator.berita.add');
    Route::post('/operator/berita/store', [BeritaController::class, 'store'])->name('operator.berita.store');
    Route::get('/operator/berita/detail/{id}', [BeritaController::class, 'show'])->name('operator.berita.show');
    Route::get('/operator/berita/edit/{id}', [BeritaController::class, 'edit'])->name('operator.berita.edit');
    Route::post('/operator/berita/update/{id}', [BeritaController::class, 'update'])->name('operator.berita.update');
    Route::get('/operator/berita/delete/{id}', [BeritaController::class, 'delete'])->name('operator.berita.delete');

    // Profile Sekolah
    Route::get('/operator/profile', [ProfilesekolahController::class, 'index'])->name('operator.profile');
    Route::get('/operator/profile/add', [ProfilesekolahController::class, 'add'])->name('operator.profile.add');
    Route::post('/operator/profile/store', [ProfilesekolahController::class, 'store'])->name('operator.profile.store');
    Route::get('/operator/profile/edit/{id}', [ProfilesekolahController::class, 'edit'])->name('operator.profile.edit');
    Route::post('/operator/profile/update/{id}', [ProfilesekolahController::class, 'update'])->name('operator.profile.update');
    Route::get('/operator/profile/delete/{id}', [ProfilesekolahController::class, 'delete'])->name('operator.profile.delete');

     Route::get('/operator/user',[UserController::class,'user'])->name('operator.user');

    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
});

//user
Route::get('/user',[UserController::class,'home'])->name('user');
Route::get('/user/berita',[BeritaController::class,'berita'])->name('berita');
Route::get('/user/berita/{id}',[BeritaController::class,'detailberita'])->name('detail.berita');
Route::get('/user/profile',[UserController::class,'show'])->name('profile');
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/galeri',[GaleriController::class,'user'])->name('galeri.user');
