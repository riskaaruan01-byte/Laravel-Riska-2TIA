<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    {{-- Start CSS --}}
    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('assets-admin/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('assets-admin/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    {{-- End CSS --}}
</head>
<body>

    {{-- start sidebar --}}
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="#">
            <span class="fw-bold">Volt Admin</span>
        </a>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item active">
                    <a href="{{ url('/pelanggan') }}" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- end sidebar --}}

    <main class="content">
        {{-- start header --}}
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <span class="fw-bold">Admin Panel</span>
                    </div>
                </div>
            </div>
        </nav>
        {{-- end header --}}

        {{-- start main content --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
                    </ol>
                </nav>
                <h2 class="h4 fw-bold">Data Pelanggan</h2>
                <p class="mb-0 text-muted">Daftar pelanggan terdaftar.</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ url('/pelanggan/create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center fw-bold">
                    + Tambah Pelanggan
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-items-center mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-bottom">NAMA LENGKAP</th>
                                <th class="border-bottom">EMAIL</th>
                                <th class="border-bottom">TANGGAL LAHIR</th>
                                <th class="border-bottom">JENIS KELAMIN</th>
                                <th class="border-bottom">NO HP</th>
                                <th class="border-bottom">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataPelanggan as $item)
                                @php
                                    $idKey = $item->pelanggan_id ?? $item->id;
                                @endphp
                                <tr>
                                    <td class="fw-semibold">{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->birthday }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <a href="{{ url('/pelanggan/' . $idKey . '/edit') }}" class="btn btn-sm btn-warning text-white fw-semibold me-1">Edit</a>
                                        <form action="{{ url('/pelanggan/' . $idKey) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger fw-semibold">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data pelanggan tersimpan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- end main content --}}

        {{-- start footer --}}
        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lh-start">© 2019-2025 Themesberg</p>
                </div>
            </div>
        </footer>
        {{-- end footer --}}
    </main>

    {{-- Start JS --}}
    <!-- Core -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Volt JS -->
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
    {{-- End JS --}}

</body>
</html>