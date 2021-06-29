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

Route::get('/login', [App\Http\Controllers\MasterController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\MasterController::class, 'index'])->name('dashboard');

Route::get('/mstr_bar', [App\Http\Controllers\MasterController::class, 'mstr_bar'])->name('mstr_bar');
    Route::post('/mstr_bar/store', [App\Http\Controllers\MasterController::class, 'store_mb'])->name('store_mb');
    Route::get('/mstr_bar/del/{mb_id}', [App\Http\Controllers\MasterController::class, 'del_mb'])->name('del_mb');
    Route::get('/mstr_bar/edit/{kt_id}', [App\Http\Controllers\MasterController::class, 'edit_mb'])->name('edit_mb');
    Route::post('/mstr_bar/upd/{kt_id}', [App\Http\Controllers\MasterController::class, 'upd_mb'])->name('upd_mb');

    Route::get('/mstr_bar/kat_bar', [App\Http\Controllers\MasterController::class, 'kat_bar'])->name('kat_bar');
        Route::post('/mstr_bar/kat_bar/store', [App\Http\Controllers\MasterController::class, 'store_kt'])->name('store_kt');
        Route::get('/mstr_bar/kat_bar/del/{kt_id}', [App\Http\Controllers\MasterController::class, 'del_kt'])->name('del_kt');
        Route::get('/mstr_bar/kat_bar/edit/{kt_id}', [App\Http\Controllers\MasterController::class, 'edit_kt'])->name('edit_kt');
        Route::post('/mstr_bar/kat_bar/upd/{kt_id}', [App\Http\Controllers\MasterController::class, 'upd_kt'])->name('upd_kt');

    Route::get('/mstr_bar/sat_bar', [App\Http\Controllers\MasterController::class, 'sat_bar'])->name('sat_bar');
        Route::post('/mstr_bar/sat_bar/store', [App\Http\Controllers\MasterController::class, 'store_sb'])->name('store_sb');
        Route::get('/mstr_bar/sat_bar/edit/{sb_id}', [App\Http\Controllers\MasterController::class, 'edit_sb'])->name('edit_sb');
        Route::post('/mstr_bar/sat_bar/upd/{sb_id}', [App\Http\Controllers\MasterController::class, 'upd_sb'])->name('upd_sb');
        Route::get('/mstr_bar/sat_bar/del/{sb_id}', [App\Http\Controllers\MasterController::class, 'del_sb'])->name('del_sb');

Route::get('/stk_bar', [App\Http\Controllers\MasterController::class, 'stk_bar'])->name('stk_bar');

Route::get('/in_bar', [App\Http\Controllers\InputController::class, 'index'])->name('in_bar');

Route::get('/out_bar', [App\Http\Controllers\OutputController::class, 'index'])->name('out_bar');

Route::get('/list_p', [App\Http\Controllers\PengajuanController::class, 'list_p'])->name('list_p');

Route::get('/', [App\Http\Controllers\PengajuanController::class, 'index'])->name('user');
    Route::post('/store', [App\Http\Controllers\PengajuanController::class, 'store_p'])->name('store_p');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
