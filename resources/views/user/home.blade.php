@extends('user.template')

@section('content')
    <section class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">{{ $sekolah->name_sekolah }}</h1>
        <p class="lead">{{ $sekolah->visi_misi }}</p>
        <a href="#tentang" class="btn btn-light btn-lg mt-3">Pelajari Lebih Lanjut</a>
    </div>
</section>

<section id="tentang" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('storage/sekolah/' . $sekolah->foto) }}"
                     alt="Foto {{ $sekolah->name_sekolah }}"
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">Tentang Kami</h2>
                <p>{{ $sekolah->deskripsi }}</p>
                <ul class="list-unstyled mt-3">
                    <li><strong>Kepala Sekolah:</strong> {{ $sekolah->kepalasekolah }}</li>
                    <li><strong>NPSN:</strong> {{ $sekolah->npsn }}</li>
                    <li><strong>Tahun Berdiri:</strong> {{ $sekolah->tahun_berdiri }}</li>
                    <li><strong>Alamat:</strong> {{ $sekolah->alamat }}</li>
                    <li><strong>Kontak:</strong> {{ $sekolah->kontak }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="ekskul" class="bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Ekstrakurikuler</h2>
        <div class="row g-4">
            @foreach($ekskuls as $ekskul)
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <img src="{{ asset('storage/fotoextra/' . $ekskul->gambar) }}"
                             class="card-img-top" alt="{{ $ekskul->name_ekstra }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ekskul->name_ekstra }}</h5>
                            <p class="card-text">{{ Str::limit($ekskul->deksripsi, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

    <section id="berita" class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-4">Berita Terbaru</h2>
            <div class="row g-4">
                @foreach($beritas as $berita)
                    <div class="col-md-4">
                        <div class="card h-100 shadow">
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $berita->judul }}</h5>
                                <p class="card-text">{{ Str::limit($berita->isi, 100) }}</p>
                                {{-- <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a> --}}
                            </div>
                            <div class="card-footer text-muted small">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="galeri" class="bg-light py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-4">Galeri Sekolah</h2>
            <div class="row g-3">
                @foreach($galeris as $galeri)
                    <div class="col-md-3 col-6">
                        @if($galeri->kategori == 'foto')
                            <img src="{{ asset('storage/galeri/' . $galeri->file) }}" class="img-fluid rounded shadow" alt="{{ $galeri->judul }}">
                        @else
                            <video controls class="w-100 rounded shadow">
                                <source src="{{ asset('storage/galeri' . $galeri->file) }}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold">Hubungi Kami</h2>
            <p class="mb-3">Jl. Pendidikan No. 123, Kota Contoh, Indonesia</p>
            <p>Email: info@sman1contoh.sch.id | Telp: (021) 123456</p>
        </div>
    </section>
@endsection
