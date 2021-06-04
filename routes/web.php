<?php

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


Route::get('/dashboard', [App\Http\Controllers\MasterController::class, 'index'])->name('dashboard');
Route::get('/mstr_bar', [App\Http\Controllers\MasterController::class, 'mstr_bar'])->name('mstr_bar');

Route::get('/', [App\Http\Controllers\PengajuanController::class, 'index'])->name('user');
Route::get('/store', [App\Http\Controllers\PengajuanController::class, 'store_p'])->name('store_p');
