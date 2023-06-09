@extends('layouts.main')

@section('title', 'Edit User')

@section('content')
    <x-admin-navbar />

    <div class="card p-3">
        <h5 class="m-0">Edit User</h5>
        <hr>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                    value="{{ old('nama', $user->nama) }}">
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email"
                    value="{{ old('email', $user->email) }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="hak_akses" class="form-label">Hak Akses</label>
                <select class="form-select form-select-sm" id="hak_akses" name="hak_akses">
                    <option @selected(old('hak_akses', $user->hak_akses) == 'ADMIN') value="ADMIN">ADMIN</option>
                    <option @selected(old('hak_akses', $user->hak_akses) == 'GURU') value="GURU">GURU</option>
                </select>
                @error('hak_akses')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Ulangi Password</label>
                <input type="password" class="form-control form-control-sm" id="password-confirmation"
                    name="password_confirmation">
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Batal</a>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
