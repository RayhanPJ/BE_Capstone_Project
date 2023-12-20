<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\ForgotPWController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\AdminController;



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
    Route::get('/home', [Home::class, 'index'])->name('home');
    Route::get('/surattugas/create', [SuratTugasController::class, 'create'])->name('surattugas.create');
    Route::post('/surattugas', [SuratTugasController::class, 'store'])->name('surattugas.store');
    Route::get('/riwayat-surat', [SuratTugasController::class, 'riwayatSurat'])->name('riwayat-surat');
    Route::get('/download-surat/{file_path}', [SuratTugasController::class, 'downloadSurat'])->name('download-surat');
    Route::get('/markasreadapprove/{id}', [SuratTugasController::class, 'markAsReadApprove'])->name('markasreadapprove');
});

// ======== admin ============
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'home'])->name('home.admin');
    Route::get('/admin/listdata', [AdminController::class, 'listdata'])->name('listdata');
    Route::get('/storage/surat-tugas/{file_path}', [AdminController::class, 'surattugasPreview'])->name('surattugas-preview');
    Route::get('/markasread/{id}', [AdminController::class, 'markAsRead'])->name('markasread');
    
    Route::post('/setujui-surat/{id}', [SuratTugasController::class, 'setujuiSurat']);
    Route::post('/tidaksetuju-surat/{id}', [SuratTugasController::class, 'tidaksetujuSurat']);
    Route::delete('/cancelsurattugas/{id}', [SuratTugasController::class, 'cancelsurattugas']);
});
