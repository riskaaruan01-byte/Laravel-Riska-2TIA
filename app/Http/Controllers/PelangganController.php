<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['gender'];
        $searchableColumns = ['first_name', 'last_name', 'email'];

        $dataPelanggan = Pelanggan::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pelanggan.index', compact('dataPelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

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

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:pelanggans,email,' . $id . ',pelanggan_id',
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|string',
            'phone'      => 'nullable|string',
        ]);

        $pelanggan->update($request->all());

        return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}