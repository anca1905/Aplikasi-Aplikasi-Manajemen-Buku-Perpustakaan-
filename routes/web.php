<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\SirkulasiController;
use App\Http\Middleware\CekRole;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface;

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

//Login
Route::view('/', 'login')->name('login');
Route::post('login/proses', [LoginController::class, 'login_proses'])->name('login_proses');

//Logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'cekrole:Admin'], 'as' => 'admin'], function () {


    //User
    Route::get('users', [AdminController::class, 'serverside'])->name('user');
    Route::get('create', [AdminController::class, 'create'])->name('users.create');
    Route::post('store', [AdminController::class, 'store'])->name('users.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    Route::get('detail/{id}', [AdminController::class, 'detail'])->name('users.detail');
    Route::put('update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('delete/{id}', [AdminController::class, 'delete'])->name('user.delete');

    //Import Excel
    Route::get('import', [ImportController::class, 'index'])->name('import');
    Route::post('import-proses', [ImportController::class, 'proses'])->name('import_proses');

    //Buku
    Route::get('data_buku', [BukuController::class, 'bukuserver'])->name('buku');
    Route::get('edit_buku/{id}', [BukuController::class, 'edit'])->name('edit_buku');
    Route::get('create_buku', [BukuController::class, 'create'])->name('create_buku');
    Route::post('store_buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('detail_buku/{id}', [BukuController::class, 'detail'])->name('buku.detail');
    Route::put('update_buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('delete_buku/{id}', [BukuController::class, 'delete'])->name('buku.delete');

    //kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::delete('kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');
    Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
});

Route::group(['prefix' => 'officer', 'middleware' => ['auth', 'cekrole:Petugas,Admin'], 'as' => 'officer'], function () {
    
    //Dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('sirkulasi', [SirkulasiController::class, 'index'])->name('sirkulasi.index');
    Route::get('sirkulasi/table', [SirkulasiController::class, 'table'])->name('sirkulasi.table');
    Route::get('index', [OfficerController::class, 'peminjaman'])->name('officer.index');
    Route::post('store', [SirkulasiController::class, 'store'])->name('sirkulasi.store');
});


