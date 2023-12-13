<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Auth;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', [Home::class, 'index'])->name('home')->middleware('auth');

Route::get('/register', [RegistController::class, 'index'])->name('regist');
Route::post('/register', [RegistController::class, 'create'])->name('post_regist');

Route::get('forgotpw', [ForgotPWController::class, 'index'])->name('forgot-pw');
Route::post('forgotpw', [ForgotPWController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ForgotPWController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotPWController::class, 'reset'])->name('password.update');

// ======== user =============

// surat
Route::get('/surattugas/create', [SuratTugasController::class, 'create'])->name('surattugas.create');
Route::post('/surattugas', [SuratTugasController::class, 'store'])->name('surattugas.store');
Route::get('/surattugas-pdf', [SuratTugasController::class, 'generateSuratTugasPDF'])->name('surattugas-pdf');


// ======== admin ============
Route::get('/admin', [AdminController::class, 'home'])->name('home.admin');
Route::get('/admin/listdata', [AdminController::class, 'listdata'])->name('listdata');

Route::get('/storage/surat-tugas/{file_path}', [AdminController::class, 'surattugasPreview'])->name('surattugas-preview');