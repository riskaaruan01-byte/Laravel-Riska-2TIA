<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @include('layouts.admin.css')
</head>
<body class="bg-light">
    <div class="d-flex">
        {{-- Sidebar --}}
        @include('layouts.admin.sidebar')

        {{-- Main Content Container --}}
        <div class="w-100 d-flex flex-column min-vh-100">
            {{-- Header --}}
            @include('layouts.admin.header')

            {{-- Dynamic Page Content --}}
            <main class="container-fluid p-4">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('layouts.admin.footer')
        </div>
    </div>

    @include('layouts.admin.js')
</body>
</html>