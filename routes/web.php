<?php

use App\Http\Controllers\AdminController;
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
    return view('login');
});

Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/pengguna', [AdminController::class, 'pengguna']);
Route::view('admin/pengguna/edit', 'admin.edit_pengguna');

