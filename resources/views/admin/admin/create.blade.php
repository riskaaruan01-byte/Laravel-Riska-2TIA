@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <h2 class="h4 fw-bold">Tambah User</h2>
    <p class="text-muted">Form untuk menambahkan data user baru.</p>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-dark fw-bold me-2">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-outline-gray-500">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection