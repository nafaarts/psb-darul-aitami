@extends('layouts.main')

@section('title', 'Cek Kelulusan')

@section('content')

    <section class="card mb-3 p-3">
        <h5 class="m-0 mt-3">Cek Kelulusan</h5>
        <hr>
        <form action="{{ route('cek-kelulusan') }}" class="col-md-6">
            <div class="mb-3">
                <label for="nik" class="form-label">Masukan NIK anda</label>
                <input type="number" name="nik" id="nik" class="form-control" value="{{ request('nik') }}">
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">Masukan NISN anda</label>
                <input type="number" name="nisn" id="nisn" class="form-control" value="{{ request('nisn') }}">
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
        @if (request()->has('nik') && request()->has('nisn'))
            <hr>
            @if (!$status)
                <div class="alert alert-warning" role="alert">
                    Mohon maaf kamu belum lulus!.
                </div>
            @else
                <div class="alert alert-success" role="alert">
                    Selamat <strong>{{ $name ?? '-' }}</strong>, kamu lulus di Pondok Pesantren Darul Aitami.
                </div>
            @endif
        @endif
    </section>

@endsection
