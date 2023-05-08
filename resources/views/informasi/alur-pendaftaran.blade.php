@extends('layouts.main')

@section('title', 'Alur Pendaftaran')

@php
    $file = App\Models\SiteMeta::where('name', 'alur-pendaftaran')->first()?->value;
@endphp

@section('content')

    <section class="card mb-3 p-3">
        <h5 class="m-0">Alur Pendaftaran</h5>
        <hr>
        {{-- // from meta site --}}
        @if ($file)
            <img src="{{ $file }}" class="img-fluid" alt="Alur Pendaftaran" />
        @else
            <p>Tidak ada data</p>
        @endif
    </section>

@endsection
