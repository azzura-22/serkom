@extends('operator.template')

@section('content')
<div class="container py-5">
    <a class="btn btn-primary" href="{{route('operator.addgaleri')}}">tambah</a>
    <h2 class="text-center mb-4">Galeri</h2>
    <div class="row g-4">
        @foreach($galeri as $item)
            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 h-100">
                    @if($item->kategori == 'foto')
                        <img src="{{ asset('storage/galeri/' . $item->file) }}"
                             class="card-img-top rounded-top-4"
                             alt="{{ $item->judul }}">
                    @elseif($item->kategori == 'vidio')
                        <div class="ratio ratio-16x9">
                            <video controls class="rounded-top-4">
                                <source src="{{ asset('storage/galeri/' . $item->file) }}" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text text-muted">{{ $item->keterangan }}</p>
                        <a class="btn btn-danger" href="{{route('admin.deletegaleri',Crypt::encrypt($item->id))}}" onclick="return confirm('Yakin ingin menghapus data ini?')">delete</a>
                    </div>
                    <div class="card-footer text-muted small">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
