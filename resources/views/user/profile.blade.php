@extends('user.template')
@section('content')

<div class="container py-5">

    {{-- Bagian Logo dan Nama Sekolah --}}
    <div class="row justify-content-center mb-5 text-center">
        <div class="col-lg-8">
            @if($profile->logo)
                <img src="{{ asset('storage/sekolah/' . $profile->logo) }}"
                     alt="Logo Sekolah"
                     class="img-fluid mb-3"
                     style="max-height: 120px;">
            @endif
            <h1 class="fw-bold">{{ $profile->name_sekolah }}</h1>
            <p class="text-muted">NPSN: {{ $profile->npsn }} | Berdiri: {{ $profile->tahun_berdiri }}</p>
        </div>
    </div>

    {{-- Bagian Kepala Sekolah --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm rounded-4 text-center">
                <div class="card-body">
                    <h5 class="fw-bold mb-2">Kepala Sekolah</h5>
                    @if($profile->Fotokepalasekolah)
                    <img src="{{ asset('storage/sekolah/' . $profile->Fotokepalasekolah) }}"
                        alt="Foto kepalasekolah"
                        class="img-fluid mb-3"
                         style="max-height: 120px;">
                    @endif
                    <p class="mb-0">{{ $profile->kepalasekolah }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bagian Tentang Sekolah --}}
    <div class="row justify-content-center mb-4">
        <div class="col-lg-10">
            <div class="card shadow-sm rounded-4">
                <div class="card-body">
                    <h3 class="mb-3">Tentang Sekolah</h3>
                    <p>{!! nl2br(e($profile->deskripsi)) !!}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bagian Visi & Misi --}}
    <div class="row justify-content-center mb-4">
        <div class="col-lg-10">
            <div class="card shadow-sm rounded-4">
                <div class="card-body">
                    <h3 class="mb-3">Visi & Misi</h3>
                    <p>{!! nl2br(e($profile->visi_misi)) !!}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bagian Kontak --}}
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm rounded-4">
                <div class="card-body">
                    <h3 class="mb-3">Kontak</h3>
                    <p><strong>Alamat:</strong> {{ $profile->alamat }}</p>
                    <p><strong>Kontak:</strong> {{ $profile->kontak }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
