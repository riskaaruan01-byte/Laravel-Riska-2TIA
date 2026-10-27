<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::latest()->get();
        return view('admin.pelanggan.index', compact('biodata'));
    }

    public function create()
    {
        return view('admin.pelanggan.form', [
            'data' => new Biodata(),
            'judul' => 'Tambah Biodata'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:biodata_nya,nim',
            'jenis_kelamin' => 'nullable|string|max:30',
            'tanggal_lahir' => 'nullable|date',
            'status' => 'nullable|string|max:100',
            'kewarganegaraan' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'pendidikan' => 'nullable|string',
            'pengalaman_kerja' => 'nullable|string',
            'kemampuan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('biodata', 'public');
        }

        Biodata::create($data);

        return redirect('/biodata')->with('success', 'Biodata berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pelanggan = Biodata::findOrFail($id);
        return view('admin.pelanggan.cv', compact('pelanggan'));
    }

    public function cv($id)
    {
        $pelanggan = Biodata::findOrFail($id);
        return view('admin.pelanggan.cv', compact('pelanggan'));
    }

    public function edit($id)
    {
        // Cari data berdasarkan ID
        $biodata = Biodata::findOrFail($id);

        return view('admin.pelanggan.form', [
            'data' => $biodata,
            'judul' => 'Edit Biodata'
        ]);
    }

    public function update(Request $request, $id)
    {
        // 1. Cari data yang akan di-update
        $biodata = Biodata::findOrFail($id);

        // 2. Validasi input
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => [
                'required', 'string', 'max:50',
                Rule::unique('biodata_nya', 'nim')->ignore($id),
            ],
            'jenis_kelamin' => 'nullable|string|max:30',
            'tanggal_lahir' => 'nullable|date',
            'status' => 'nullable|string|max:100',
            'kewarganegaraan' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'pendidikan' => 'nullable|string',
            'pengalaman_kerja' => 'nullable|string',
            'kemampuan' => 'nullable|string',
        ]);

        // 3. Jika ada upload foto baru, hapus foto lama lalu simpan foto baru
        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }

            $data['foto'] = $request->file('foto')->store('biodata', 'public');
        }

        // 4. Update data di database
        $biodata->update($data);

        return redirect('/biodata')->with('success', 'Biodata berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $biodata = Biodata::findOrFail($id);

        // Hapus file foto dari storage jika ada
        if ($biodata->foto) {
            Storage::disk('public')->delete($biodata->foto);
        }

        // Hapus baris data dari database
        $biodata->delete();

        return redirect('/biodata')->with('success', 'Biodata berhasil dihapus.');
    }
}