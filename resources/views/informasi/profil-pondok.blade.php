@extends('layouts.main')

@section('title', 'Profil Pondok')

@php
    $profil = App\Models\SiteMeta::where('name', 'profil')->first()?->value;
@endphp

@section('content')
    <section class="card mb-3 p-3">
        <h5 class="m-0 mt-3">Profil Pondok</h5>
        <hr>

        {!! $profil !!}
    </section>
@endsection
