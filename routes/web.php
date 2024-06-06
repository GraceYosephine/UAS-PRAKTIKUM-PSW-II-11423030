<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

// Route::get('/pengelola', [PengelolaController::class,'index']);

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index');
    Route::get('admin/pengelola', 'pengelola');
    Route::get('admin/tambahpengelola', 'tambahpengelola');
    Route::post('admin/simpanpengelola', 'simpanpengelola');
    Route::get('admin/ubahpengelola/{id}', 'ubahpengelola');
    Route::post('admin/updatepengelola/{id}', 'updatepengelola');
    Route::get('admin/hapuspengelola/{id}', 'hapuspengelola');

    Route::get('admin/lapangan', 'lapangan');
    Route::get('admin/tambahlapangan', 'tambahlapangan');
    Route::post('admin/simpanlapangan', 'simpanlapangan');
    Route::get('admin/ubahlapangan/{id}', 'ubahlapangan');
    Route::post('admin/updatelapangan/{id}', 'updatelapangan');
    Route::get('admin/hapuslapangan/{id}', 'hapuslapangan');

    Route::get('admin/pengguna', 'pengguna');
    Route::get('admin/tambahpengguna', 'tambahpengguna');
    Route::post('admin/simpanpengguna', 'simpanpengguna');
    Route::get('admin/ubahpengguna/{id}', 'ubahpengguna');
    Route::post('admin/updatepengguna/{id}', 'updatepengguna');
    Route::get('admin/hapuspengguna/{id}', 'hapuspengguna');

    Route::get('admin/logout', 'logout');

    Route::get('admin/booking', 'booking');
    Route::get('admin/laporan', 'laporan');
    Route::get('admin/pembayaran/{id}', 'pembayaran');
    Route::post('admin/simpanpembayaran/{id}', 'simpanpembayaran');
    Route::get('admin/pembayaranhapus/{id}', 'pembayaranhapus');
});

use App\Http\Controllers\HomeController;

Route::controller(HomeController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('home', 'index');
        Route::get('home/lapangan', 'lapangan');
        Route::get('home/pengelola/{id}', 'pengelola');
        Route::get('home/detail/{id}', 'detail');
        Route::get('home/akun', 'akun');
        Route::post('home/ubahakun/{id}', 'ubahakun');
        Route::get('home/keranjang', 'keranjang');
        Route::get('home/hapuskeranjang/{id}', 'hapuskeranjang');
        Route::get('home/checkout', 'checkout');
        Route::post('home/docheckout', 'docheckout');
        Route::get('home/riwayat', 'riwayat');
        Route::post('home/pesan', 'pesan');
        Route::get('home/transaksidetail/{id}', 'transaksidetail');
        Route::get('home/notacetak/{id}', 'notacetak');
        Route::post('home/pembayaransimpan', 'pembayaransimpan');
        Route::post('home/selesai', 'selesai');
        Route::post('home/updatekeranjang', 'updatekeranjang');
        Route::post('home/hapuskeranjang', 'hapuskeranjang');
    });

    Route::get('home/login', 'login');
    Route::post('home/dologin', 'dologin');
    Route::get('home/daftar', 'daftar');
    Route::post('home/dodaftar', 'dodaftar');
    Route::get('home/logout', 'logout');
});

