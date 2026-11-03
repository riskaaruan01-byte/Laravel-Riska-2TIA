
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

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
                    <h2 class="h4 fw-bold">Data User</h2>
                    <p class="text-muted mb-0">List data seluruh user.</p>
                </div>

                <a href="{{ url('/user/create') }}"
                   class="btn btn-sm btn-success fw-bold">
                    + Tambah User
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card border-0 shadow">
                <div class="card-body p-0">
                    <div class="table-responsive">

                        <table class="table table-hover align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>PASSWORD</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>••••••••</td>
                                        <td>
                                            <a href="{{ url('/user/'.$user->id.'/edit') }}"
                                               class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ url('/user/'.$user->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            Belum ada data user.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>

        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <p class="mb-0 text-center">© 2019-2025 Themesberg</p>
        </footer>

    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

</body>
</html>
