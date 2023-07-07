<?php

use App\Http\Controllers\KartuUjianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/profil-pondok', function () {
    return view('informasi.profil-pondok');
})->name('profil-pondok');

Route::get('/informasi', function () {
    return view('informasi.informasi');
})->name('informasi');

Route::get('/cek-kelulusan', App\Http\Controllers\CekKelulusanController::class)->name('cek-kelulusan');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('can:admin-guru');

    Route::get('/santri-lulus', [App\Http\Controllers\DashboardController::class, 'santriLulus'])->name('santri.lulus');

    Route::get('/santri/{santri:no_daftar}/detail', [App\Http\Controllers\SantriController::class, 'detail'])->name('santri.detail')->middleware('can:admin-guru');

    Route::middleware('can:santri')->group(function () {
        Route::get('/pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'pendaftaran'])->name('pendaftaran');
        Route::post('/pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('pendaftaran.store');
        Route::post('/pendaftaran/orang-tua', [App\Http\Controllers\PendaftaranController::class, 'storeOrangTua'])->name('pendaftaran.orang-tua');
        Route::post('/pendaftaran/pendidikan', [App\Http\Controllers\PendaftaranController::class, 'storePendidikan'])->name('pendaftaran.pendidikan');
        Route::post('/pendaftaran/prestasi', [App\Http\Controllers\PendaftaranController::class, 'storePrestasi'])->name('pendaftaran.prestasi');
        Route::delete('/pendaftaran/prestasi/{prestasi}/destroy', [App\Http\Controllers\PendaftaranController::class, 'destroyPrestasi'])->name('pendaftaran.destroy-prestasi');
        Route::post('/pendaftaran/riwayat-penyakit', [App\Http\Controllers\PendaftaranController::class, 'storeRiwayatPenyakit'])->name('pendaftaran.riwayat-penyakit');
        Route::delete('/pendaftaran/riwayat-penyakit/{riwayatpenyakit}/destroy', [App\Http\Controllers\PendaftaranController::class, 'destroyRiwayatPenyakit'])->name('pendaftaran.destroy-riwayat-penyakit');

        Route::post('/upload-bukti-pembayaran', App\Http\Controllers\UploadBuktiPembayaranController::class)->name('upload-bukti-pembayaran');

        Route::get('/pendaftaran/kartu-ujian', KartuUjianController::class)->name('pendaftaran.kartu-ujian');
    });

    Route::middleware('can:admin')->group(function () {
        Route::resource('/users', App\Http\Controllers\UserController::class)->except('show');

        Route::put('/santri/{santri}/toggle-lulus', [App\Http\Controllers\SantriController::class, 'toggleLulus'])->name('santri.toggle-lulus');
        Route::put('/santri/{santri}/konfirmasi-pembayaran', [App\Http\Controllers\SantriController::class, 'konfirmasiPembayaran'])->name('santri.konfirmasi-pembayaran');

        Route::get('/santri/{santri}/edit', [App\Http\Controllers\SantriController::class, 'edit'])->name('santri.edit');
        Route::put('/santri/{santri}/update', [App\Http\Controllers\SantriController::class, 'update'])->name('santri.update');
        Route::delete('/santri/{santri}/destroy', [App\Http\Controllers\SantriController::class, 'destroy'])->name('santri.destroy');

        Route::put('/santri/{santri}/update-orangtua', [App\Http\Controllers\SantriController::class, 'updateOrangtua'])->name('santri.update-orangtua');
        Route::put('/santri/{santri}/update-pendidikan', [App\Http\Controllers\SantriController::class, 'updatePendidikan'])->name('santri.update-pendidikan');
        Route::post('/santri/{santri}/add-prestasi', [App\Http\Controllers\SantriController::class, 'storePrestasi'])->name('santri.store-prestasi');
        Route::delete('/santri/prestasi/{prestasi}/destroy', [App\Http\Controllers\SantriController::class, 'destroyPrestasi'])->name('santri.destroy-prestasi');
        Route::post('/santri/{santri}/add-riwayat-penyakit', [App\Http\Controllers\SantriController::class, 'storeRiwayatPenyakit'])->name('santri.store-riwayat-penyakit');
        Route::delete('/santri/riwayat-penyakit/{riwayatpenyakit}/destroy', [App\Http\Controllers\SantriController::class, 'destroyRiwayatPenyakit'])->name('santri.destroy-riwayat-penyakit');

        Route::delete('/santri/{santri}/destroy', [App\Http\Controllers\SantriController::class, 'destroy'])->name('santri.destroy');

        Route::get('/edit-pengumuman', [App\Http\Controllers\KonfigurasiController::class, 'pengumuman'])->name('pengumuman.edit');
        Route::get('/edit-profil', [App\Http\Controllers\KonfigurasiController::class, 'profil'])->name('profil.edit');

        Route::get('/remove-meta/{sitemeta}', [App\Http\Controllers\KonfigurasiController::class, 'removeMetaFile'])->name('remove.meta');

        Route::put('/konfigurasi', [App\Http\Controllers\KonfigurasiController::class, 'update'])->name('konfigurasi.update');
    });

    Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
    Route::put('/profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');
});
