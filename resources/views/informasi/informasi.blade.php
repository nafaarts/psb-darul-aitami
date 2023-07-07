@extends('layouts.main')

@section('title', 'Informasi Penerimaan Santri Baru')

@php
    $pengumuman = App\Models\SiteMeta::where('name', 'pengumuman')->first()?->value;
    $image = App\Models\SiteMeta::where('name', 'pengumuman_image')->first()?->value;
    $file = App\Models\SiteMeta::where('name', 'pengumuman_file')->first()?->value;
@endphp

@section('content')

    <section class="card mb-3 p-3">
        <h5 class="m-0 mt-3">Informasi Penerimaan Santri Baru</h5>
        <hr>
        @if ($image)
            <div class="mb-2">
                <img src="{{ asset('storage/meta/' . $image) }}" alt="gambar" width="100%">
            </div>
        @endif

        {!! $pengumuman !!}

        @if ($file)
            lampiran berkas: <a href="{{ asset('storage/meta/' . $file) }}">Download</a>
        @endif
    </section>

@endsection
