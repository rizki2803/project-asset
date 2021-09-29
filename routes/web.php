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

Route::get('/create-user',function() {


    $data[] = [
        'nik' => ('123'),
        'name' => ('farhan'),
        'departemen' => ('IT'),
        'email' => ('farhan@gmail.com'),
        'email_verified_at' => now(),
        'password' => bcrypt('farhan'),
        'remember_token' => Str::random(10),
    ];

    DB::table('users')->insert($data);
});

Route::get('/create-account',function(){

        $data[] = [
            'nik' => ('123'),
            'name' => ('farhan'),
            'departemen' => ('IT'),
            'email' => ('farhan@gmail.com'),
            'email_verified_at' => now(),
            'password' => bcrypt('farhan'),
            'remember_token' => Str::random(10),
        ];

    DB::table('users')->insert($data);
});


Route::middleware([\App\Http\Middleware\Login_cek::class])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\MasterController::class, 'index'])->name('dashboard')/*->middleware('Login_cek');*/;

    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


    Route::get('/mstr_bar', [App\Http\Controllers\MasterController::class, 'mstr_bar'])->name('mstr_bar');
        Route::post('/mstr_bar/store', [App\Http\Controllers\MasterController::class, 'store_mb'])->name('store_mb');
        Route::get('/mstr_bar/del/{mb_id}', [App\Http\Controllers\MasterController::class, 'del_mb'])->name('del_mb');
        Route::get('/mstr_bar/edit/{mb_id}', [App\Http\Controllers\MasterController::class, 'edit_mb'])->name('edit_mb');
        Route::post('/mstr_bar/upd/{mb_id}', [App\Http\Controllers\MasterController::class, 'upd_mb'])->name('upd_mb');

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

    Route::get('/srvc_bar', [App\Http\Controllers\MasterController::class, 'srvc_bar'])->name('srvc_bar');
        Route::get('/srvc_bar/isi/{p_reg}', [App\Http\Controllers\MasterController::class, 'isi_srvc'])->name('isi_srvc');
        Route::post('/srvc_bar/store', [App\Http\Controllers\MasterController::class, 'store_srvc'])->name('store_srvc');
        Route::get('/srvc_bar/edit/{s_id}', [App\Http\Controllers\MasterController::class, 'edit_srvc'])->name('edit_srvc');
        Route::post('/srvc_bar/upd/{s_id}', [App\Http\Controllers\MasterController::class, 'upd_srvc'])->name('upd_srvc');
        Route::get('/srvc_bar/del/{s_id}', [App\Http\Controllers\MasterController::class, 'del_srvc'])->name('del_srvc');
        Route::get('/srvc_bar/stat/{s_id}', [App\Http\Controllers\MasterController::class, 'stat_srvc'])->name('stat_srvc');

    Route::get('/in_bar', [App\Http\Controllers\InputController::class, 'index'])->name('in_bar');
        Route::post('/in_bar/store', [App\Http\Controllers\InputController::class, 'store_in'])->name('store_in');
        Route::get('/in_bar/edit/{in_id}', [App\Http\Controllers\InputController::class, 'edit_in'])->name('edit_in');
        Route::post('/in_bar/upd/{in_id}', [App\Http\Controllers\InputController::class, 'upd_in'])->name('upd_in');
        Route::get('/in_bar/del/{in_id}', [App\Http\Controllers\InputController::class, 'del_in'])->name('del_in');
        Route::get('/in_bar/isi/{p_reg}', [App\Http\Controllers\InputController::class, 'isi_in'])->name('isi_in');


    Route::get('/out_bar', [App\Http\Controllers\OutputController::class, 'index'])->name('out_bar');
        Route::post('/out_bar/store', [App\Http\Controllers\OutputController::class, 'store_out'])->name('store_out');
        Route::get('/out_bar/edit/{out_id}', [App\Http\Controllers\OutputController::class, 'edit_out'])->name('edit_out');
        Route::post('/out_bar/upd/{out_id}', [App\Http\Controllers\OutputController::class, 'upd_out'])->name('upd_out');
        Route::get('/out_bar/del/{out_id}', [App\Http\Controllers\OutputController::class, 'del_out'])->name('del_out');
        Route::get('/out_bar/isi/{p_reg}', [App\Http\Controllers\OutputController::class, 'isi_out'])->name('isi_out');
// });

Route::get('/list_p', [App\Http\Controllers\PengajuanController::class, 'list_p'])->name('list_p');

Route::get('/', [App\Http\Controllers\PengajuanController::class, 'index'])->name('user');
    Route::post('/store', [App\Http\Controllers\PengajuanController::class, 'store_p'])->name('store_p');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/detail-kode-regis', [App\Http\Controllers\PengajuanController::class, 'detailKodeRegistrasi'])->name('user.detailKodeRegistrasi');
    Route::get('tesnotif', [App\Http\Controllers\PengajuanController::class, 'notiftes']);
    Route::get('getDataPegawai/{nik}', [App\Http\Controllers\PengajuanController::class, 'getDataPegawai'])->name('user.getDataPegawai');
    Route::get('/pengajuanBarang/{kode_reg}/{p_token}', [App\Http\Controllers\PengajuanController::class, 'approve'])->name('user.pengajuanBarang.atasan.approve');
    Route::get('/pengajuanBarang/{kode_reg}/1/{p_token}', [App\Http\Controllers\PengajuanController::class, 'approveseq1'])->name('user.pengajuanBarang.atasan.seq1.approve');
    Route::get('/pengajuanBarang/{kode_reg}/2/{p_token}', [App\Http\Controllers\PengajuanController::class, 'approveseq2'])->name('user.pengajuanBarang.atasan.seq2.approve');
    Route::get('/pengajuanBarang/reject/{kode_reg}/{p_token}', [App\Http\Controllers\PengajuanController::class, 'reject'])->name('user.pengajuanBarang.atasan.reject');
    Route::post('/pengajuanBarang/store/reject/{kode_reg}/{p_token}', [App\Http\Controllers\PengajuanController::class, 'StoreReject'])->name('user.pengajuanBarang.atasan.storeReject');
    Route::get('get-data/{p_reg}', function ($p_reg){
        $data = App\Models\Approve::join('bar_p', 'bar_p.p_id', '=', 'aprv.p_id')->where('bar_p.p_reg', $p_reg)
            ->orderBy('a_seq', 'ASC')
            ->get();
        return view('data-tabel', ['data' => $data]);
    });
});