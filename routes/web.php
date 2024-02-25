<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\ForgotPWController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\SuratIzinPenelitianController;



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

// ======== auth ============
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegistController::class, 'index'])->name('regist');
Route::post('/register', [RegistController::class, 'create'])->name('post_regist');
Route::get('forgotpw', [ForgotPWController::class, 'index'])->name('forgot-pw');
Route::post('forgotpw', [ForgotPWController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ForgotPWController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotPWController::class, 'reset'])->name('password.update');

// ======== user =============
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');

    // pembuatan surat
    Route::get('/surattugas/create/{id}', [SuratTugasController::class, 'create'])->name('surattugas.create');
    Route::get('/suratizinpenelitian/create/{id}', [SuratIzinPenelitianController::class, 'create'])->name('suratizinpenelitian.create');
    Route::post('/surattugas', [SuratTugasController::class, 'store'])->name('surattugas.store');
    Route::post('/suratizinpenelitian', [SuratIzinPenelitianController::class, 'store'])->name('suratizinpenelitian.store');

    // riwayat surat
    Route::get('/riwayat-surat-tugas', [SuratTugasController::class, 'riwayatSuratTugas'])->name('riwayat-surat-tugas');
    Route::get('/riwayat-surat-izin-penelitian', [SuratIzinPenelitianController::class, 'riwayatSuratIzinPenelitian'])->name('riwayat-surat-izin-penelitian');

    // download surat
    Route::get('/download-surat/{file_path}', [SuratTugasController::class, 'downloadSurat'])->name('download-surat');
    Route::get('/download-surat/{file_path}', [SuratIzinPenelitianController::class, 'downloadSuratIzinPenelitian'])->name('download-surat');

    Route::get('/markasreadapprove/{id}', [SuratTugasController::class, 'markAsReadApprove'])->name('markasreadapprove');
    Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile/{id}', [UserController::class, 'lengkapiProfile'])->name('user.lengkapiprofile');
    Route::get('/user/settings-account/{id}', [UserController::class, 'settingAccount'])->name('user.settingAccount');
    Route::get('/user/settings-security/{id}', [UserController::class, 'settingSecurity'])->name('user.settingSecurity');
    Route::post('/user/settings/{id}', [UserController::class, 'changePassword'])->name('change.password');
});

// ======== admin ============
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'home'])->name('home.admin');
    Route::get('/admin/listdata/surattugas', [AdminController::class, 'listdataSuratTugas'])->name('listdata.surattugas');
    Route::get('/admin/listdata/suratizinpenelitian', [AdminController::class, 'listdataSuratIzinPenelitian'])->name('listdata.suratizinpenelitian');
    Route::get('/storage/{folders}/{file_path}', [AdminController::class, 'suratPreview'])
        ->name('surat-preview');

    Route::get('/markasread/{id}', [AdminController::class, 'markAsRead'])->name('markasread');

    // Route::post('/setujui-surat/{id}', [SuratTugasController::class, 'setujuiSurat']);
    // Route::post('/tidaksetuju-surat/{id}', [SuratTugasController::class, 'tidaksetujuSurat']);
    // Route::delete('/cancelsurattugas/{id}', [SuratTugasController::class, 'cancelsurattugas']);

    // Route::post('/setujui-surat/{id}', [SuratIzinPenelitianController::class, 'setujuiSuratIzinPenelitian']);
    // Route::post('/tidaksetuju-surat/{id}', [SuratIzinPenelitianController::class, 'tidaksetujuSuratIzinPenelitian']);
    // Route::delete('/cancelsurattugas/{id}', [SuratIzinPenelitianController::class, 'cancelsuratIzinPenelitian']);

    // For SuratTugasController
    Route::post('/setujui-surat-tugas/{id}', [SuratTugasController::class, 'setujuiSurat']);
    Route::post('/tidaksetuju-surat-tugas/{id}', [SuratTugasController::class, 'tidaksetujuSurat']);
    Route::delete('/cancelsurattugas/{id}', [SuratTugasController::class, 'cancelsurattugas']);

    // For SuratIzinPenelitianController
    Route::post('/setujui-surat-izin-penelitian/{id}', [SuratIzinPenelitianController::class, 'setujuiSuratIzinPenelitian']);
    Route::post('/tidaksetuju-surat-izin-penelitian/{id}', [SuratIzinPenelitianController::class, 'tidaksetujuSuratIzinPenelitian']);
    Route::delete('/cancelsurat-izin-penelitian/{id}', [SuratIzinPenelitianController::class, 'cancelsuratIzinPenelitian']);


    Route::get('/admin/profile/{id}', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/{id}', [AdminController::class, 'changePassword'])->name('change.password.admin');
});
