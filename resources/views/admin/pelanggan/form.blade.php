
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul }}</title>
    <link href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>
<body>
<nav class="sidebar d-lg-block bg-gray-800 text-white">
    <div class="sidebar-inner px-4 pt-3">
        <h5>Biodata CV</h5>
        <a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a>
        <a href="{{ route('pelanggan.index') }}" class="nav-link text-white">Data Pelanggan</a>
        <a href="{{ route('biodata.index') }}" class="nav-link text-white">Biodata CV</a>
    </div>
</nav>

<main class="content">
    <div class="py-4">
        <a href="{{ route('biodata.index') }}">← Kembali</a>
        <h1 class="h4 mt-3">{{ $judul }}</h1>
        <p>Lengkapi data diri untuk membuat CV.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow">
        <div class="card-body">
            <form
                action="{{ $data->exists
                    ? route('biodata.update', $data->getKey())
                    : route('biodata.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @if($data->exists)
                    @method('PUT')
                @endif

                <h5 class="mb-3">Data Diri</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" name="nama" class="form-control"
                               value="{{ old('nama', $data->nama) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIM *</label>
                        <input type="text" name="nim" class="form-control"
                               value="{{ old('nim', $data->nim) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">Pilih jenis kelamin</option>
                            @foreach(['Laki-laki', 'Perempuan'] as $jk)
                                <option value="{{ $jk }}"
                                    @selected(old('jenis_kelamin', $data->jenis_kelamin) == $jk)>
                                    {{ $jk }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control"
                               value="{{ old('tanggal_lahir', $data->tanggal_lahir?->format('Y-m-d')) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <input name="status" class="form-control"
                               value="{{ old('status', $data->status) }}"
                               placeholder="Contoh: Belum menikah">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kewarganegaraan</label>
                        <input name="kewarganegaraan" class="form-control"
                               value="{{ old('kewarganegaraan', $data->kewarganegaraan ?? 'Indonesia') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $data->email) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. HP</label>
                        <input name="no_hp" class="form-control"
                               value="{{ old('no_hp', $data->no_hp) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jurusan</label>
                        <input name="jurusan" class="form-control"
                               value="{{ old('jurusan', $data->jurusan) }}"
                               placeholder="Contoh: Teknik Informatika">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="foto" class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">
                        <small class="text-secondary">Format JPG, PNG, WEBP. Maksimal 2 MB.</small>

                        @if($data->foto)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$data->foto) }}"
                                     alt="Foto profil"
                                     style="width:100px;height:100px;object-fit:cover;border-radius:50%">
                            </div>
                        @endif
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $data->alamat) }}</textarea>
                    </div>
                </div>

                <hr>
                <h5 class="mb-3">Pendidikan</h5>
                <div class="mb-3">
                    <label class="form-label">Riwayat Pendidikan</label>
                    <textarea name="pendidikan" class="form-control" rows="4"
                        placeholder="2024-sekarang | Nama kampus | Jurusan&#10;2021-2024 | Nama SMA">{{ old('pendidikan', $data->pendidikan) }}</textarea>
                </div>

                <hr>
                <h5 class="mb-3">Pengalaman Kerja</h5>
                <div class="mb-3">
                    <label class="form-label">Riwayat Pengalaman</label>
                    <textarea name="pengalaman_kerja" class="form-control" rows="4"
                        placeholder="2026 | Nama perusahaan | Posisi&#10;Tuliskan tugas atau tanggung jawab">{{ old('pengalaman_kerja', $data->pengalaman_kerja) }}</textarea>
                </div>

                <hr>
                <h5 class="mb-3">Kemampuan</h5>
                <div class="mb-4">
                    <label class="form-label">Keahlian</label>
                    <textarea name="kemampuan" class="form-control" rows="3"
                        placeholder="Contoh: HTML, CSS, PHP, komunikasi, kerja tim">{{ old('kemampuan', $data->kemampuan) }}</textarea>
                </div>

                <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    {{ $data->exists ? 'Update Biodata' : 'Simpan Biodata' }}
                </button>
            </form>
        </div>
    </div>
</main>

<script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
