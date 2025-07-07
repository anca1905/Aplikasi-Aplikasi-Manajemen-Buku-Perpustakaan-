<?php

use App\Http\Controllers\AdminController;
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

Route::view('/', 'login');

Route::post('login/proses', [LoginController::class, 'login_proses'])->name('login_proses');

//Route Admin
Route::get('admin/users', [AdminController::class, 'user'])->name('user');
Route::get('admin/create', [AdminController::class, 'create'])->name('users.create');
Route::post('admin/store', [AdminController::class, 'store'])->name('users.store');
Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('users.update');
Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('user.delete');