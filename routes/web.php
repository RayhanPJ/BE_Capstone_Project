<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Auth;
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

// surat
Route::get('/surattugas', [SuratTugasController::class, 'index'])->name('surattugas');
Route::get('/surattugas/create', [SuratTugasController::class, 'create'])->name('surattugas.create');
Route::post('/surattugas', [SuratTugasController::class, 'store'])->name('surattugas.store');
Route::get('/surattugas-pdf', [SuratTugasController::class, 'generateSuratTugasPDF'])->name('surattugas-pdf');
