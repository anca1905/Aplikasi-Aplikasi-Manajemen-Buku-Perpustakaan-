<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\Route as RoutingRoute;
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

//Login
Route::view('/', 'login')->name('login');
Route::post('login/proses', [LoginController::class, 'login_proses'])->name('login_proses');

//Logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin'], function () {

    //Dashboard
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');

    //User
    Route::get('users', [AdminController::class, 'user'])->name('user');
    Route::get('create', [AdminController::class, 'create'])->name('users.create');
    Route::post('store', [AdminController::class, 'store'])->name('users.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('delete/{id}', [AdminController::class, 'delete'])->name('user.delete');

    //Data Tabel Server Side
    Route::get('server_table', [DataTableController::class, 'serverside'])->name('serverside');

    //Import Excel
    Route::get('import', [ImportController::class, 'index'])->name('import');
    Route::post('import-proses', [ImportController::class, 'proses'])->name('import_proses');

    //Buku
    Route::get('data_buku', [BukuController::class, 'buku'])->name('buku');
    Route::get('edit_buku/{id}', [BukuController::class, 'edit'])->name('edit_buku');
    Route::get('create_buku', [BukuController::class, 'create'])->name('create_buku');
});
