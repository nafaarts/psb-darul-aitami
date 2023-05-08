@extends('layouts.main')

@section('title', 'Pengumuman Pendaftaran')

@php
    $file = App\Models\SiteMeta::where('name', 'pengumuman-pendaftaran')->first()?->value;
@endphp

@section('content')

    <section class="card mb-3 p-3">
        <h5 class="m-0">Pengumuman Pendaftaran</h5>
        <hr>
        {{-- // from meta site --}}
        @if ($file)
            <object data="{{ asset($file) }}" type="application/pdf" width="100%" height="900px">
                <p>Unable to display PDF file.
                    <a href="{{ asset($file) }}">Download</a>
                    instead.
                </p>
            </object>
        @else
            <p>Tidak ada data</p>
        @endif
    </section>

@endsection
