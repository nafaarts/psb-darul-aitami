@extends('layouts.main')

@section('title', 'Profil Pondok')

@php
    $profil = App\Models\SiteMeta::where('name', 'profil')->first()?->value;
    $image = App\Models\SiteMeta::where('name', 'profil_image')->first()?->value;
    $file = App\Models\SiteMeta::where('name', 'profil_file')->first()?->value;
@endphp

@section('content')
    <section class="card mb-3 p-3">
        <h5 class="m-0 mt-3">Profil Pondok</h5>
        <hr>
        @if ($image)
            <div class="mb-2">
                <img src="{{ asset('storage/meta/' . $image) }}" alt="gambar" width="100%">
            </div>
        @endif

        <div class="mb-3">
            {!! $profil !!}
        </div>

        @if ($file)
            lampiran berkas: <a href="{{ asset('storage/meta/' . $file) }}">Download</a>
        @endif
    </section>
@endsection
