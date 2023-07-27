@extends('layouts.main')

@section('title', 'Kategori Nilai')

@section('content')
    <x-admin-navbar />

    @if (session('berhasil'))
        <div class="alert alert-success" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="m-0">Kategori Nilai</h5>
            <a href="{{ route('kategori-nilai.create') }}" class="btn btn-sm btn-primary text-white">
                <i class="bi bi-plus-lg"></i> Tambah Kategori
            </a>
        </div>
        <hr>
        <form action="{{ route('kategori-nilai.index') }}" method="GET" class="input-group mb-3">
            <input type="text" class="form-control bg-white" placeholder="Cari Nama Pelajaran" name="cari"
                value="{{ request('cari') }}">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_pelajaran }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('kategori-nilai.edit', $item) }}"
                                        class="btn btn-sm btn-warning text-white">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('kategori-nilai.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('yakin dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $kategori->links() }}
    </div>
@endsection
