<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Dikomentari sementara agar halaman dashboard bisa dibuka saat belum login
        // if (!Auth::check()) {
        //     return redirect()->route('login')
        //         ->withErrors(['email' => 'Silakan login terlebih dahulu!']);
        // }

        return view('admin.dashboard');
    }
}