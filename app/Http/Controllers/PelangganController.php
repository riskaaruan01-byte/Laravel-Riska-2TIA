<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPelanggan = Pelanggan::latest()->get();
        // Diubah dari 'admin.pelanggan.index' menjadi 'pelanggan.index'
        return view('pelanggan.index', compact('dataPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Diubah dari 'admin.pelanggan.create' menjadi 'pelanggan.create'
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:pelanggans,email',
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|string',
            'phone'      => 'nullable|string',
        ]);

        Pelanggan::create($request->all());

        return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        // Diubah dari 'admin.pelanggan.edit' menjadi 'pelanggan.edit'
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:pelanggans,email,' . $id,
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|string',
            'phone'      => 'nullable|string',
        ]);

        $pelanggan->update($request->all());

        return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}