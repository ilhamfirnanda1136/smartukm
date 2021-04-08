<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,homeController,kategoriController,anggotaController,galleryController
};

Route::get('/', function () {
    return view('welcome');
});

/* Authentication Admin */
Route::get('login',[AuthController::class,'index']);
Route::post('login',[AuthController::class,'process'])->name('login');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

/* Authentication Anggota */
Route::get('register/anggota',[AuthController::class,'indexRegisterAnggota']);
Route::post('register/anggota',[AuthController::class,'processRegisterAnggota']);
Route::get('anggota/login',[AuthController::class,'indexLoginAnggota']);
Route::post('anggota/login',[AuthController::class,'processLoginAnggota']);
Route::get('anggota/logout',[AuthController::class,'anggotaLogout'])->name('anggota.logout');

/* admin dashboard */
Route::middleware(['auth'])->group(function () {

     /* Dashboard */
    Route::get('home',[homeController::class,'index'])->name('home');

    /* kategori */
    Route::prefix('kategori')->group(function () {

        Route::get('',[kategoriController::class,'indexKategori']);
        Route::post('',[kategoriController::class,'simpanKategori'])->name('simpan.kategori');
        Route::get('hapus/{id}',[kategoriController::class,'hapusKategori']);

        Route::prefix('sub')->group(function () {
            Route::get('',[kategoriController::class,'indexSubKategori']);
            Route::post('',[kategoriController::class,'simpanSubKategori'])->name('simpan.sub.kategori');
            Route::get('hapus/{id}',[kategoriController::class,'hapusSubKategori']);
        });
    });

    /* Anggota */
    Route::prefix('anggota')->group(function () {
        Route::get('',[anggotaController::class,'indexAnggota']);
        Route::get('approval',[anggotaController::class,'indexApprovalAnggota']);
        Route::get('approval/status/{id}',[anggotaController::class,'ApproveAnggota']);
        Route::get('detail',[anggotaController::class,'detailAnggota']);
        Route::post('simpan/update/admin',[anggotaController::class,'updateAnggotaAdmin'])->name('simpan.anggota.update.admin');
        Route::post('update/foto/admin',[anggotaController::class,'updateFotoAnggotaAdmin']);
        Route::post('change/password',[anggotaController::class,'changePasswordAdmin']);
    });
});

/* anggota dashboard */

Route::middleware(['ceklogin'])->group(function () {
    
    Route::prefix('anggota')->group(function () {
        /* Dashboard */
        Route::get('dashboard',[homeController::class,'indexAnggotaDashboard']);

        /* galery */
        Route::get('galery',[galleryController::class,'index']);
        Route::get('table/galery',[galleryController::class,'tableGalery'])->name('table.galery');
        Route::post('simpan/galery',[galleryController::class,'simpanGalery'])->name('simpan.galery');
        Route::get('detail/galery/{id}',[galleryController::class,'detailGalery']);
        Route::get('delete/galery/{id}',[galleryController::class,'deleteGalery']);

        /* Profile */
        Route::get('profile',[anggotaController::class,'indexProfile']);
        Route::post('profile',[anggotaController::class,'simpanProfile']);
        Route::get('change/password',[anggotaController::class,'indexChangePassword']);
        Route::post('change/password',[anggotaController::class,'simpanProfilePassword']);
    });


});