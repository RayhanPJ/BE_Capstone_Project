<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuratTugasController;

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

Route::get('/',[Home::class, 'index']);
Route::get('/login',[Auth::class, 'index']);

// ======== user =============

// surat
Route::get('/previewsurattugas/{id}', [SuratTugasController::class, 'previewsurat']);

Route::get('/surattugas/create', [SuratTugasController::class, 'create'])->name('surattugas.create');
Route::post('/surattugas', [SuratTugasController::class, 'store'])->name('surattugas.store');
Route::get('/surattugas-pdf', [SuratTugasController::class, 'generateSuratTugasPDF'])->name('surattugas-pdf');
Route::post('/setujui-surat/{id}', [SuratTugasController::class,'setujuiSurat']);
Route::post('/tidaksetuju-surat/{id}', [SuratTugasController::class,'tidaksetujuSurat']);

Route::delete('/cancelsurattugas/{id}', [SuratTugasController::class,'cancelsurattugas']);


// ======== admin ============
Route::get('/admin', [AdminController::class, 'home'])->name('home.admin');
Route::get('/admin/listdata', [AdminController::class, 'listdata'])->name('listdata');