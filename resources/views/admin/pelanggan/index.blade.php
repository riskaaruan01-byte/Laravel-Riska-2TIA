<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Biodata - Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background-color: #1e252b; color: #fff; }
        .sidebar .nav-link { color: #b0b7c3; padding: 12px 20px; }
        .sidebar .nav-link.active { background-color: #2b353e; color: #fff; border-left: 4px solid #0d6efd; }
        .content { padding: 30px; }
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .img-thumb { width: 45px; height: 45px; object-fit: cover; border-radius: 50%; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="p-3 text-white border-bottom border-secondary">Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/biodata') }}">Data Biodata</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 content">
            <!-- Breadcrumb -->
            <p class="text-muted small mb-1">Dashboard / Biodata</p>
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h3 class="fw-bold mb-0">Data Biodata</h3>
                    <p class="text-muted small mb-0">Daftar seluruh biodata yang terdaftar.</p>
                </div>
                <a href="{{ Route::has('biodata.create') ? route('biodata.create') : (Route::has('pelanggan.create') ? route('pelanggan.create') : url('/biodata/create')) }}" class="btn btn-dark fw-bold">+ Tambah Data</a>
            </div>

            <!-- Flash Alert -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Table Card -->
            <div class="card p-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>FOTO</th>
                                <th>NAMA</th>
                                <th>NIM / EMAIL</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>NO HP</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($biodata ?? $pelanggan ?? [] as $item)
                                @php
                                    $id = $item->id ?? $item->pelanggan_id;
                                    $nama = $item->nama ?? trim(($item->first_name ?? '') . ' ' . ($item->last_name ?? ''));
                                    $identitas = $item->nim ?? $item->email ?? '-';
                                    $tgl = $item->tanggal_lahir ?? $item->birthday ?? '-';
                                    $jk = $item->jenis_kelamin ?? $item->gender ?? '-';
                                    $hp = $item->no_hp ?? $item->phone ?? '-';
                                @endphp
                                <tr>
                                    <td>
                                        @if(isset($item->foto) && $item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" class="img-thumb">
                                        @else
                                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:45px; height:45px; font-size:14px;">
                                                {{ strtoupper(substr($nama, 0, 1)) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-bold">{{ $nama }}</td>
                                    <td>{{ $identitas }}</td>
                                    <td>{{ is_a($tgl, 'DateTime') || is_a($tgl, 'Carbon\Carbon') ? $tgl->format('Y-m-d') : $tgl }}</td>
                                    <td>{{ $jk }}</td>
                                    <td>{{ $hp }}</td>
                                    <td class="text-center">
                                        <!-- Tombol CV -->
                                        <a href="{{ Route::has('biodata.cv') ? route('biodata.cv', $id) : (Route::has('pelanggan.cv') ? route('pelanggan.cv', $id) : url('/biodata/'.$id.'/cv')) }}" class="btn btn-sm btn-info text-white">CV</a>
                                        
                                        <!-- Tombol Edit -->
                                        <a href="{{ Route::has('biodata.edit') ? route('biodata.edit', $id) : (Route::has('pelanggan.edit') ? route('pelanggan.edit', $id) : url('/biodata/'.$id.'/edit')) }}" class="btn btn-sm btn-primary">Edit</a>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ Route::has('biodata.destroy') ? route('biodata.destroy', $id) : (Route::has('pelanggan.destroy') ? route('pelanggan.destroy', $id) : url('/biodata/'.$id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada data biodata tersimpan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>