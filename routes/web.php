<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // <-- Pastikan baris ini ada di paling atas

Route::get('/home', [HomeController::class, 'index']);