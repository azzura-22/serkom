@extends('user.template')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg rounded-4">
                @if($berita->gambar)
                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="card-img-top rounded-top-4"
                         style="max-height: 400px; object-fit: cover;">
                @endif

                <div class="card-body p-4">
                    <h2 class="card-title mb-3">{{ $berita->judul }}</h2>
                    <p class="text-muted mb-4">
                        Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}
                    </p>

                    <div class="card-text">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('berita') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
