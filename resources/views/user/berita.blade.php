@extends('user.template')
@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Berita Terbaru</h2>
    <div class="row">
        @foreach ($berita as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 rounded-4">
                @if($item->gambar)
                <img src="{{ asset('storage/berita/' . $item->gambar) }}"
                     class="card-img-top rounded-top-4"
                     alt="{{ $item->judul }}"
                     style="height:200px; object-fit:cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text text-muted small">
                        {{ $item->created_at->format('d M Y') }}
                    </p>
                    <p class="card-text">
                        {{ Str::limit(strip_tags($item->isi), 100, '...') }}
                    </p>
                    <a href="{{ route('detail.berita', $item->id) }}" class="btn btn-primary mt-auto">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
