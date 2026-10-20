<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama'       => 'required',
            'email'      => 'required|email',
            'pertanyaan' => 'required',
        ]);

        // Ambil data yang sudah lolos validasi
        $nama       = $validated['nama'];
        $email      = $validated['email'];
        $pertanyaan = $validated['pertanyaan'];

        // Buat format pesan flash
        $pesan = "Terimakasih <strong>{$nama}</strong>! Pertanyaan ini: <strong>{$pertanyaan}</strong> akan segera direspon melalui email <strong>{$email}</strong>";

        // Redirect kembali ke halaman form dengan flash data 'info' dan 'thankyou'
        return redirect()->back()
            ->with('info', $pesan)
            ->with('thankyou', [
                'nama'       => $nama,
                'email'      => $email,
                'pertanyaan' => $pertanyaan,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}