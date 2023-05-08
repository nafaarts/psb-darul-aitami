@extends('layouts.main')

@section('title', 'Informasi Biaya')

@php
    $file = App\Models\SiteMeta::where('name', 'informasi-biaya')->first()?->value;
@endphp

@section('content')

    <section class="card mb-3 p-3">
        <h5 class="m-0">Informasi Biaya</h5>
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
