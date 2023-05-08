@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    {{-- Slider --}}
    <section class="rounded overflow-hidden mb-3">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner bg-light">
                <div class="carousel-item active">
                    <div class="d-flex align-items-center" style="height: 500px">
                        <img src="https://images.unsplash.com/photo-1570975640108-2292d83390ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center" style="height: 500px">

                        <img src="https://images.unsplash.com/photo-1554911940-05efc1892bc5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex align-items-center" style="height: 500px">
                        <img src="https://images.unsplash.com/photo-1581726707445-75cbe4efc586?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    {{-- CTA --}}
    <section class="card border-0 py-5 text-center bg-light mb-3">
        <h2>PENDAFTARAN SANTRI BARU</h2>
        <h5 class="text-muted">Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}</h5>
        <hr class="w-25 mx-auto">
        <a href="{{ route('pendaftaran') }}" class="btn btn-primary mx-auto" style="width: fit-content">
            Daftar Sekarang
        </a>
    </section>

    {{-- Maps --}}
    <section class="bg-light mb-3 rounded">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4">Peta</h3>
                        <div class="row">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9420.937894050892!2d112.34622245625418!3d-6.8886323646217935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77e9f088da2fb1%3A0x42fc4c67a58e0855!2sPondok%20Pesantren%20Al-Ishlah!5e0!3m2!1sid!2sid!4v1612787419523!5m2!1sid!2sid"
                                width="800" height="600" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 d-flex align-items-stretch text-white ">
                    <div class="bg-primary w-100 p-md-5 p-4">
                        <h3>Hubungi Kami</h3>
                        <p class="mb-4">Pukul 07:30 - 15:00 WIB</p>
                        <div class="w-100 d-flex align-items-start">
                            <div class="text pl-3">
                                <p>
                                    <strong>Alamat:</strong>
                                    <br>
                                    Tapaktuan - Medan, KM. 21
                                    Kampung Baro, Kec. Pasie Raja,
                                    Kab. Aceh Selatan,
                                    Provinsi Aceh
                                </p>
                            </div>
                        </div>
                        <div class="w-100 d-flex align-items-center">
                            <div class="text pl-3">
                                <p>
                                    <strong>Telp/WA:</strong>
                                    <br>
                                    <a class="text-white" href="tel://082123458301">
                                        CS 1: (+62)812-3377-1715
                                    </a>
                                    <br>
                                    <a class="text-white" href="tel://085230860703">
                                        CS 2: (+62)812-3377-1716
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="w-100 d-flex align-items-center">
                            <div class="text pl-3">
                                <p>
                                    <strong>Email:</strong>
                                    <br>
                                    <a class="text-white" href="mailto:psb@alishlah.ac.id">psb@alishlah.ac.id</a>
                                </p>
                            </div>
                        </div>
                        <div class="w-100 d-flex align-items-center">
                            <div class="text pl-3">
                                <p>
                                    <strong>Website:</strong>
                                    <br>
                                    <a class="text-white" href="#">{{ request()->host() }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
