<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\OWController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PemasukkanController;
use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return redirect('login');
// });

// Route Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::group(['middleware' => 'auth'], function() {
    // Route Dashboard
    Route::get('/home',function() {
        return view('home');
    });

    // Route Kecamatan
    Route::get('/kecamatan', [KecamatanController::class, 'tampil']);
    Route::get('/kecamatan/tambah', [KecamatanController::class, 'tambah']);
    Route::post('/kecamatan/upload', [KecamatanController::class, 'upload']);
    Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit']);
    Route::put('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
    Route::get('/kecamatan/hapus/{id_kecamatan}', [KecamatanController::class, 'hapus']);
    Route::get('/kecamatan/export', [KecamatanController::class, 'export']);

    // Route Fasilitas
    Route::get('/fasilitas', [FasilitasController::class, 'tampil']);
    Route::get('/fasilitas/tambah', [FasilitasController::class, 'tambah']);
    Route::post('/fasilitas/upload', [FasilitasController::class, 'upload']);
    Route::get('/fasilitas/edit/{id_fasilitas}', [FasilitasController::class, 'edit']);
    Route::put('/fasilitas/update/{id_fasilitas}', [FasilitasController::class, 'update']);
    Route::get('/fasilitas/hapus/{id_fasilitas}', [FasilitasController::class, 'hapus']);
    Route::get('/fasilitas/export', [FasilitasController::class, 'export']);

    // Route Objek Wisata
    Route::get('/ow', [OWController::class, 'tampil']);
    Route::get('/ow/tambah', [OWController::class, 'tambah']);
    Route::post('/ow/upload', [OWController::class, 'upload']);
    Route::get('/ow/detail/{id_ow}', [OWController::class, 'detail']);
    Route::get('/ow/edit/{id_ow}', [OWController::class, 'edit']);
    Route::put('/ow/update/{id_ow}', [OWController::class, 'update']);
    Route::get('/ow/hapus/{id_ow}', [OWController::class, 'hapus']);
    Route::get('/ow/export_objek/{id_ow}', [OWController::class, 'export_objek']);
    Route::get('/ow/export', [OWController::class, 'export']);

    // Route Pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'tampil']);
    Route::get('/pengunjung/tambah', [PengunjungController::class, 'tambah']);
    Route::post('/pengunjung/upload', [PengunjungController::class, 'upload']);
    Route::get('/pengunjung/edit/{id_pengunjung}', [PengunjungController::class, 'edit']);
    Route::put('/pengunjung/update/{id_pengunjung}', [PengunjungController::class, 'update']);
    Route::get('/pengunjung/hapus/{id_pengunjung}', [PengunjungController::class, 'hapus']);
    Route::get('/pengunjung/export', [PengunjungController::class, 'export']);

    // Route Pemasukan
    Route::get('/pemasukan', [PemasukkanController::class, 'tampil']);
    Route::get('/pemasukan/tambah', [PemasukkanController::class, 'tambah']);
    Route::post('/pemasukan/upload', [PemasukkanController::class, 'upload']);
    Route::get('/pemasukan/edit/{id_pemasukan}', [PemasukkanController::class, 'edit']);
    Route::put('/pemasukan/update/{id_pemasukan}', [PemasukkanController::class, 'update']);
    Route::get('/pemasukan/hapus/{id_pemasukan}', [PemasukkanController::class, 'hapus']);
    Route::get('/pemasukan/export', [PemasukkanController::class, 'export']);

});







