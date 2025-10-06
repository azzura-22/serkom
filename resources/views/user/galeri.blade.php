@extends('user.template')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - {{ $sekolah->name_sekolah ?? 'Sekolah' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* Hero Section: Bagian utama halaman galeri */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }

        /* Gaya judul section dengan garis dekoratif */
        .section-title {
            position: relative;
            margin-bottom: 3rem;
            text-align: center;
            font-weight: 700;
            color: var(--primary-color);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            border-radius: 2px;
        }

        /* Card untuk setiap item galeri */
        .gallery-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            background: white;
        }

        /* Efek hover pada card galeri */
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        /* Gaya untuk gambar galeri */
        .gallery-img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        /* Efek zoom pada gambar saat hover */
        .gallery-card:hover .gallery-img {
            transform: scale(1.05);
        }

        /* Container untuk video galeri */
        .gallery-video {
            height: 250px;
            object-fit: cover;
            background: #000;
        }

        /* Overlay untuk video (ikon play) */
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .video-overlay {
            pointer-events: none; /* biar overlay tidak menghalangi klik */
        }

        /* Efek hover pada overlay video */
        .gallery-card:hover .video-overlay {
            opacity: 0.8;
        }

        /* Badge untuk menampilkan kategori (foto/video) */
        .kategori-badge {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Badge untuk filter kategori */
        .filter-badge {
            background: var(--secondary-color);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin: 5px;
            border: 2px solid transparent;
        }

        /* Efek hover pada badge filter */
        .filter-badge:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Gaya untuk badge filter yang aktif */
        .filter-badge.active {
            background: var(--primary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Badge untuk menampilkan tanggal upload */
        .date-badge {
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        /* Tampilan ketika tidak ada data galeri */
        .no-gallery {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .no-gallery i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        /* Gaya untuk pagination */
        .pagination .page-link {
            border: none;
            color: var(--primary-color);
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        /* Efek hover pada pagination */
        .pagination .page-link:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Gaya untuk halaman aktif di pagination */
        .pagination .page-item.active .page-link {
            background: var(--primary-color);
            color: white;
        }

        /* Media query untuk tampilan mobile */
        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0;
            }

            .gallery-img, .gallery-video {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar: Navigasi atas halaman -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand/logo sekolah -->
            <a class="navbar-brand fw-bold" href="{{ url('/user') }}">
                <i class="fas fa-graduation-cap me-2"></i>
                {{ $sekolah->name_sekolah ?? 'Sekolah' }}
            </a>
            <!-- Link kembali ke beranda -->
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ url('/user') }}">
                    <i class="fas fa-arrow-left me-1"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section: Bagian header dengan background gradient -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <!-- Judul utama halaman galeri -->
                    <h1 class="display-4 fw-bold mb-4">Galeri Sekolah</h1>
                    <!-- Deskripsi singkat galeri -->
                    <p class="lead mb-4">Kumpulan momen berharga dan kegiatan sekolah kami</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section: Bagian utama konten galeri -->
    <section class="py-5">
        <div class="container">
            <!-- Judul section galeri -->
            <h2 class="section-title">Koleksi Galeri</h2>

            <!-- Filter Section: Filter berdasarkan kategori -->
            <div class="text-center mb-5">
                <h5 class="mb-3">Filter Berdasarkan Kategori:</h5>
                <div>
                    <!-- Filter: Semua kategori -->
                    <a href="?kategori=all" class="filter-badge {{ !request('kategori') || request('kategori') == 'all' ? 'active' : '' }}">
                        <i class="fas fa-th me-1"></i>Semua
                    </a>
                    <!-- Filter: Foto saja -->
                    <a href="?kategori=foto" class="filter-badge {{ request('kategori') == 'foto' ? 'active' : '' }}">
                        <i class="fas fa-image me-1"></i>Foto
                    </a>
                    <!-- Filter: Video saja -->
                    <a href="?kategori=vidio" class="filter-badge {{ request('kategori') == 'vidio' ? 'active' : '' }}">
                        <i class="fas fa-video me-1"></i>Video
                    </a>
                </div>
            </div>

            <!-- Gallery Counter: Informasi jumlah konten yang ditampilkan -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Menampilkan <strong>{{ $galeris->count() }}</strong> item
                        <!-- Menampilkan kategori filter jika dipilih -->
                        @if(request('kategori') && request('kategori') != 'all')
                            dengan kategori <strong>{{ ucfirst(request('kategori')) }}</strong>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Gallery Grid: Grid layout untuk menampilkan item galeri -->
            <div class="row g-4">
                <!-- Loop melalui setiap item galeri -->
                @forelse($galeris as $galeri)
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-card h-100">
                            <div class="position-relative overflow-hidden">
                                <!-- Badge tanggal upload -->
                                <span class="date-badge">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d M Y') }}
                                </span>

                                <!-- Tampilkan gambar jika kategori foto -->
                                @if($galeri->kategori == 'foto')
                                    <img src="{{ asset('storage/galeri/' . $galeri->file) }}"
                                         class="gallery-img w-100"
                                         alt="{{ $galeri->judul }}"
                                         onerror="this.src='https://via.placeholder.com/400x250/2c3e50/ffffff?text=Foto+Galeri'">
                                @else
                                    <!-- Tampilkan video jika kategori video -->
                                    <div class="position-relative">
                                        <video class="gallery-video w-100" controls>
                                            <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                                            Browser Anda tidak mendukung tag video.
                                        </video>
                                        <!-- Overlay dengan ikon play -->
                                        <div class="video-overlay">
                                            <i class="fas fa-play-circle" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Body card: Informasi judul dan keterangan -->
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <!-- Judul galeri -->
                                    <h5 class="card-title fw-bold mb-0">{{ $galeri->judul }}</h5>
                                    <!-- Badge kategori -->
                                    <span class="kategori-badge">
                                        @if($galeri->kategori == 'foto')
                                            <i class="fas fa-camera me-1"></i>Foto
                                        @else
                                            <i class="fas fa-video me-1"></i>Video
                                        @endif
                                    </span>
                                </div>

                                <!-- Keterangan galeri (jika ada) -->
                                @if($galeri->keterangan)
                                    <p class="card-text text-muted mb-0">{{ Str::limit($galeri->keterangan, 100) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Tampilan ketika tidak ada data galeri -->
                    <div class="col-12">
                        <div class="no-gallery">
                            <i class="fas fa-images"></i>
                            <h4>Belum Ada Konten Galeri</h4>
                            <p class="mb-4">Galeri sekolah akan segera diupdate dengan konten terbaru.</p>
                            <a href="{{ url('/user') }}" class="btn btn-primary">
                                <i class="fas fa-home me-1"></i>Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination: Navigasi halaman untuk data yang banyak -->
            @if($galeris->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page Link: Tombol halaman sebelumnya --}}
                            @if($galeris->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fas fa-chevron-left me-1"></i>Sebelumnya
                                    </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $galeris->previousPageUrl() }}{{ request('kategori') ? '&kategori=' . request('kategori') : '' }}">
                                        <i class="fas fa-chevron-left me-1"></i>Sebelumnya
                                    </a>
                                </li>
                            @endif

                            {{-- Pagination Elements: Nomor halaman --}}
                            @foreach($galeris->getUrlRange(1, $galeris->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $galeris->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}{{ request('kategori') ? '&kategori=' . request('kategori') : '' }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            {{-- Next Page Link: Tombol halaman selanjutnya --}}
                            @if($galeris->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $galeris->nextPageUrl() }}{{ request('kategori') ? '&kategori=' . request('kategori') : '' }}">
                                        Selanjutnya<i class="fas fa-chevron-right ms-1"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        Selanjutnya<i class="fas fa-chevron-right ms-1"></i>
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Footer: Bagian bawah halaman dengan informasi copyright -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">
                &copy; {{ date('Y') }} {{ $sekolah->name_sekolah ?? 'Sekolah' }}.
                Total Galeri: {{ $totalGaleri }} |
                Foto: {{ $totalFoto }} |
                Video: {{ $totalVideo }}
            </p>
        </div>
    </footer>
</body>
@endsection
