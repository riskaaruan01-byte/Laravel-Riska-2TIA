<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route khusus untuk menampilkan CV (mencegah error 404)
Route::get('/biodata/{id}/cv', [BiodataController::class, 'cv'])->name('biodata.cv');
Route::get('/pelanggan/{id}/cv', [BiodataController::class, 'cv'])->name('pelanggan.cv');

// Route CRUD Pelanggan & Biodata
Route::resource('pelanggan', PelangganController::class);
Route::resource('biodata', BiodataController::class);