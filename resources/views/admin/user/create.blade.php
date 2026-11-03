
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>

    <link href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>
<body>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse">
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3">
                <li class="nav-item">
                    <a href="{{ url('/pelanggan') }}" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ url('/user') }}" class="nav-link">
                        <span class="sidebar-text">User</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard">
            <div class="container-fluid">
                <span class="fw-bold">Admin Panel</span>
            </div>
        </nav>

        <div class="container-fluid py-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/user') }}">User</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Tambah User
                            </li>
                        </ol>
                    </nav>

                    <h2 class="h4 fw-bold">Tambah User</h2>
                    <p class="text-muted">Form untuk menambahkan data user baru.</p>
                </div>

                <a href="{{ url('/user') }}" class="btn btn-sm btn-dark">
                    Kembali
                </a>
            </div>

            <div class="card border-0 shadow">
                <div class="card-body">

                    <form action="{{ url('/user') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       required>
                            </div>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">
                                Simpan
                            </button>

                            <a href="{{ url('/user') }}"
                               class="btn btn-outline-warning">
                                Batal
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

</body>
</html>
