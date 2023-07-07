@extends('layouts.main')

@section('title', 'Informasi Penerimaan Santri Baru')

@php
    $pengumuman = App\Models\SiteMeta::where('name', 'pengumuman')->first()?->value;
@endphp

@section('content')

    <section class="card mb-3 p-3">
        <h5 class="m-0 mt-3">Informasi Penerimaan Santri Baru</h5>
        <hr>
        {{-- // image here --}}

        {!! $pengumuman !!}

        {{-- link here --}}
    </section>

@endsection
