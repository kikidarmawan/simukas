<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterData\SaldoController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasterData\KegiatanController;
use App\Http\Controllers\MasterData\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatController;
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

Route::group([
    'middleware' => ['guest:web']
], function () {
    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'proses'])->name('login');
});

Route::group([
    'middleware' => ['auth:web']
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'master'], function () {
        Route::resource('saldo', SaldoController::class);
    });

    Route::group(['prefix' => 'master'], function () {
        Route::resource('mutasi', MutasiController::class);
    });

    Route::group(['prefix' => 'master'], function () {
        Route::resource('kegiatan', KegiatanController::class);
    });

    Route::group(['prefix' => 'master'], function () {
        Route::resource('Pengguna', PenggunaController::class);
    });
    Route::group(['prefix' => 'master'], function () {
        Route::resource('transaksi', TransaksiController::class);
    });
    Route::group(['prefix' => 'master'], function () {
        Route::resource('laporan', LaporanController::class);
    });






    //charts controller
 });
