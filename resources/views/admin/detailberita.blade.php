@extends('admin.template')

@section('content')
<div class="container py-5">
    @csrf
    <div class="card shadow-lg rounded-4">
        <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
             class="card-img-top rounded-top-4"
             alt="{{ $berita->judul }}" style="max-height:400px; object-fit:cover;">

        <div class="card-body">
            <h3 class="card-title">{{ $berita->judul }}</h3>
            <p class="text-muted">
                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                • Ditulis oleh <strong>{{ $berita->user->name }}</strong>
            </p>
            <div class="mt-3">
                {!! nl2br(e($berita->isi)) !!}
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('admin.berita') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
