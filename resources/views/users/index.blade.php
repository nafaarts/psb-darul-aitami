@extends('layouts.main')

@section('title', 'User')

@section('content')
    <x-admin-navbar />

    @if (session('berhasil'))
        <div class="alert alert-success" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    <section class="card p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="m-0">Users</h5>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary text-white">
                <i class="bi bi-plus-lg"></i> Tambah User
            </a>
        </div>
        <hr>
        <form action="{{ route('users.index') }}" method="GET" class="input-group mb-3">
            <input type="text" class="form-control bg-white" placeholder="Cari User" name="cari"
                value="{{ request('cari') }}">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Hak Akses</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->nama }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->hak_akses }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('Yakin dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </section>

@endsection
