<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class BiodataController extends Controller
{
    // Menampilkan daftar biodata
    public function index()
    {
        $biodata = Biodata::latest()->get();

        return view('admin.biodata.index', compact('biodata'));
    }

    // Menampilkan form tambah biodata
    public function create()
    {
        return view('admin.biodata.form', [
            'data' => new Biodata(),
            'judul' => 'Tambah Biodata'
        ]);
    }

    // Menyimpan biodata baru
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
            $data['foto'] = $request->file('foto')
                ->store('biodata', 'public');
        }

        Biodata::create($data);

        return redirect('/biodata')
            ->with('success', 'Biodata berhasil ditambahkan.');
    }

    // Menampilkan detail CV
    public function show($id)
    {
        $pelanggan = Biodata::findOrFail($id);

        return view('admin.biodata.cv', compact('pelanggan'));
    }

    // Menampilkan CV
    public function cv($id)
    {
        $pelanggan = Biodata::findOrFail($id);

        return view('admin.biodata.cv', compact('pelanggan'));
    }

    // Menampilkan form edit biodata
    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);

        return view('admin.biodata.form', [
            'data' => $biodata,
            'judul' => 'Edit Biodata'
        ]);
    }

    // Memperbarui biodata
    public function update(Request $request, $id)
    {
        $biodata = Biodata::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => [
                'required',
                'string',
                'max:50',
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

        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('biodata', 'public');
        }

        $biodata->update($data);

        return redirect('/biodata')
            ->with('success', 'Biodata berhasil diperbarui.');
    }

    // Menghapus biodata
    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);

        if ($biodata->foto) {
            Storage::disk('public')->delete($biodata->foto);
        }

        $biodata->delete();

        return redirect('/biodata')
            ->with('success', 'Biodata berhasil dihapus.');
    }
}
