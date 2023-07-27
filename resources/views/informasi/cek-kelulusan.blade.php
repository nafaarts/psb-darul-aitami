@extends('layouts.main')

@section('title', 'Cek Kelulusan')

@section('content')

    <section class="card mb-3 p-3">
        <h5 class="m-0 mt-3">Cek Kelulusan</h5>
        <hr>
        <form action="{{ route('cek-kelulusan') }}" class="col-md-6">
            <div class="mb-3">
                <label for="no_daftar" class="form-label">Masukan Nomor Pendaftaran anda</label>
                <input type="number" name="no_daftar" id="no_daftar" class="form-control" value="{{ request('no_daftar') }}">
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">Masukan NISN anda</label>
                <input type="number" name="nisn" id="nisn" class="form-control" value="{{ request('nisn') }}">
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
        @if (request()->has('no_daftar') && request()->has('nisn'))
            <hr>
            @if ($status == 3)
                <div class="alert alert-warning" role="alert">
                    Data anda salah atau tidak ditemukan, mohon cek kembali data yang anda masukan.
                </div>
            @elseif($status == 2)
                <div class="alert alert-danger" role="alert">
                    Mohon maaf <strong>{{ $name ?? '-' }}</strong>, kamu belum lulus di Pondok Pesantren Darul Aitami.
                </div>
            @else
                <div class="alert alert-success" role="alert">
                    Selamat <strong>{{ $name ?? '-' }}</strong>, kamu lulus di Pondok Pesantren Darul Aitami.
                </div>
            @endif
        @endif
    </section>

@endsection
