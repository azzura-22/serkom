@extends('user.template')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $sekolah->name_sekolah }}</title>
    <!-- Framework CSS Bootstrap untuk styling responsif -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variabel CSS untuk konsistensi warna */
        :root {
            --primary-color: #2c3e50;    /* Warna utama - biru tua */
            --secondary-color: #3498db;  /* Warna sekunder - biru */
            --accent-color: #e74c3c;     /* Warna aksen - merah */
            --light-color: #f8f9fa;      /* Warna terang */
            --dark-color: #2c3e50;       /* Warna gelap */
        }

        /* Gaya dasar body */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            scroll-behavior: smooth;
        }

        /* Hero Section - Bagian utama atas website */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 120px 0;
            position: relative;
            overflow: hidden;
        }

        /* Efek dekoratif latar belakang hero section */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
        }

        /* Gaya judul section */
        .section-title {
            position: relative;
            margin-bottom: 3rem;
            text-align: center;
            font-weight: 700;
            color: var(--primary-color);
        }

        /* Garis dekoratif di bawah judul section */
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

        /* Gaya card untuk konten */
        .card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        /* Efek hover pada card */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        /* Gaya gambar di dalam card */
        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        /* Efek zoom pada gambar card saat hover */
        .card:hover .card-img-top {
            transform: scale(1.1);
        }

        /* Gaya gambar tentang sekolah */
        .about-img {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }

        /* Efek hover pada gambar tentang */
        .about-img:hover {
            transform: scale(1.02);
        }

        /* Gaya list fitur sekolah */
        .feature-list {
            list-style: none;
            padding: 0;
        }

        /* Gaya item list fitur */
        .feature-list li {
            margin-bottom: 15px;
            padding: 15px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 10px;
            border-left: 4px solid var(--secondary-color);
            transition: all 0.3s ease;
        }

        /* Efek hover pada item list */
        .feature-list li:hover {
            transform: translateX(10px);
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        }

        /* Padding untuk row dalam carousel */
        .carousel-item .row {
            padding: 20px 0;
        }

        /* Gaya kontrol carousel */
        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            background: rgba(0,0,0,0.3);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            margin: 0 15px;
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        /* Efek hover pada kontrol carousel */
        .carousel-control-prev:hover, .carousel-control-next:hover {
            background: rgba(0,0,0,0.6);
            transform: translateY(-50%) scale(1.1);
        }

        /* Section kontak dengan background gradient */
        .contact-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2530 100%);
            color: white;
        }

        /* Gaya link media sosial */
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin: 0 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        /* Efek hover pada link media sosial */
        .social-links a:hover {
            background: var(--secondary-color);
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        /* Gaya tanggal berita */
        .news-date {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
        }

        /* Gaya tombol primary */
        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        /* Efek hover tombol primary */
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        /* Gaya tombol light */
        .btn-light {
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        /* Efek hover tombol light */
        .btn-light:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
            border-color: rgba(255,255,255,0.5);
        }

        /* Container untuk video */
        .video-container {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        /* Overlay untuk video */
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
        }

        /* Gaya angka statistik */
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: block;
            line-height: 1;
        }

        /* Gaya label statistik */
        .stat-label {
            font-size: 1.1rem;
            color: var(--dark-color);
            font-weight: 600;
        }

        /* Gaya info kontak */
        .contact-info {
            background: rgba(255,255,255,0.1);
            border-radius: 15px;
            padding: 30px;
            margin: 20px 0;
            backdrop-filter: blur(10px);
        }

        /* Padding section */
        section {
            padding: 80px 0;
        }

        /* Navigasi mobile - tampil hanya di layar kecil */
        .mobile-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: none;
        }

        /* Link navigasi mobile */
        .mobile-nav .nav-link {
            text-align: center;
            padding: 10px;
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.8rem;
        }

        /* Ikon navigasi mobile */
        .mobile-nav .nav-link i {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        /* Status aktif navigasi mobile */
        .mobile-nav .nav-link.active {
            color: var(--secondary-color);
        }

        /* Media query untuk tampilan mobile */
        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 0;
            }

            .display-4 {
                font-size: 2.5rem;
            }

            section {
                padding: 60px 0;
                margin-bottom: 60px; /* Tambah margin untuk navigasi mobile */
            }

            .mobile-nav {
                display: flex; /* Tampilkan navigasi mobile */
            }

            .contact-info {
                padding: 20px;
                margin: 15px 0;
            }
        }

        /* Animasi fade in CSS */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Kelas untuk animasi fade in */
        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        /* Progress bar untuk carousel */
        .carousel-progress {
            height: 4px;
            background: #e9ecef;
            margin-top: 20px;
            border-radius: 2px;
            overflow: hidden;
        }

        /* Bar progress carousel */
        .carousel-progress-bar {
            height: 100%;
            background: var(--secondary-color);
            width: 0%;
            transition: width 4s linear;
        }
    </style>
</head>
<body>
    <!-- Hero Section: Bagian utama website -->
    <section id="home" class="hero-section fade-in">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <!-- Nama sekolah -->
                    <h1 class="display-4 fw-bold mb-4">{{ $sekolah->name_sekolah }}</h1>
                    <!-- Visi misi sekolah -->
                    <p class="lead mb-4 fs-5">{{ $sekolah->visi_misi }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Tentang Kami: Informasi tentang sekolah -->
    <section id="tentang" class="py-5 fade-in">
        <div class="container">
            <h2 class="section-title">Tentang Kami</h2>
            <div class="row align-items-center">
                <!-- Foto sekolah -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('storage/sekolah/' . $sekolah->foto) }}"
                         alt="Foto {{ $sekolah->name_sekolah }}"
                         class="img-fluid about-img">
                </div>
                <!-- Deskripsi dan informasi sekolah -->
                <div class="col-lg-6">
                    <p class="mb-4 fs-5 text-muted">{{ $sekolah->deskripsi }}</p>
                    <!-- List informasi penting sekolah -->
                    <ul class="feature-list">
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

    <!-- Section Ekstrakurikuler: Menampilkan kegiatan ekstrakurikuler -->
    <section id="ekskul" class="py-5 bg-light fade-in">
        <div class="container">
            <h2 class="section-title">Ekstrakurikuler</h2>
            <div class="row g-4">
                <!-- Loop untuk menampilkan setiap ekstrakurikuler -->
                @foreach($ekskuls as $ekskul)
                    <div class="col-md-4">
                        <div class="card shadow h-100">
                            <!-- Gambar ekstrakurikuler -->
                            <img src="{{ asset('storage/fotoextra/' . $ekskul->gambar) }}"
                                 class="card-img-top" alt="{{ $ekskul->name_ekstra }}">
                            <div class="card-body d-flex flex-column">
                                <!-- Nama ekstrakurikuler -->
                                <h5 class="card-title">{{ $ekskul->name_ekstra }}</h5>
                                <!-- Deskripsi singkat -->
                                <p class="card-text flex-grow-1">{{ Str::limit($ekskul->deksripsi, 100) }}</p>
                                <!-- Kategori ekstrakurikuler -->
                                <div class="mt-auto">
                                    <span class="badge bg-primary rounded-pill">{{ $ekskul->kategori ?? 'Umum' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Berita: Menampilkan berita terbaru -->
    <section id="berita" class="py-5 fade-in">
        <div class="container">
            <h2 class="section-title">Berita Terbaru</h2>
            <div class="row g-4">
                <!-- Loop untuk menampilkan setiap berita -->
                @foreach($beritas as $berita)
                    <div class="col-md-4">
                        <div class="card h-100 shadow position-relative">
                            <!-- Tanggal berita -->
                            <div class="news-date">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                            </div>
                            <!-- Gambar berita -->
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                                 class="card-img-top" alt="{{ $berita->judul }}">
                            <div class="card-body d-flex flex-column">
                                <!-- Judul berita -->
                                <h5 class="card-title">{{ $berita->judul }}</h5>
                                <!-- Isi berita singkat -->
                                <p class="card-text flex-grow-1">{{ Str::limit($berita->isi, 100) }}</p>
                                <!-- Tombol baca selengkapnya -->
                                <div class="mt-auto">
                                    <a href="{{ route('detail.berita', $berita->id) }}"
                                       class="btn btn-primary btn-sm">
                                        Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Galeri: Menampilkan foto dan video sekolah -->
    <section id="galeri" class="py-5 bg-light fade-in">
        <div class="container">
            <h2 class="section-title">Galeri Sekolah</h2>
            <!-- Carousel Bootstrap untuk galeri -->
            <div id="galeriCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Loop untuk setiap chunk galeri (4 item per slide) -->
                    @foreach ($galeris->chunk(4) as $chunkIndex => $galeriChunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="row g-3">
                                <!-- Loop untuk setiap item dalam chunk -->
                                @foreach ($galeriChunk as $galeri)
                                    <div class="col-md-3 col-6">
                                        @if($galeri->kategori == 'foto')
                                            <!-- Tampilkan gambar jika kategori foto -->
                                            <img src="{{ asset('storage/galeri/' . $galeri->file) }}"
                                                 class="d-block w-100 img-fluid rounded shadow"
                                                 alt="{{ $galeri->judul }}"
                                                 style="height: 200px; object-fit: cover;">
                                        @else
                                            <!-- Tampilkan video jika kategori video -->
                                            <div class="video-container">
                                                <video controls class="w-100 rounded shadow" style="height: 200px; object-fit: cover;">
                                                    <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                                                    Browser Anda tidak mendukung tag video.
                                                </video>
                                                <div class="video-overlay">
                                                    <i class="fas fa-play-circle text-white" style="font-size: 3rem;"></i>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Kontrol carousel sebelumnya -->
                <button class="carousel-control-prev" type="button" data-bs-target="#galeriCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <!-- Kontrol carousel selanjutnya -->
                <button class="carousel-control-next" type="button" data-bs-target="#galeriCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Progress bar untuk carousel -->
            <div class="carousel-progress">
                <div class="carousel-progress-bar"></div>
            </div>
        </div>
    </section>

    <!-- Section Kontak: Informasi kontak sekolah -->
    <section id="kontak" class="py-5 contact-section fade-in">
        <div class="container text-center">
            <h2 class="section-title text-white">Hubungi Kami</h2>

            <!-- Informasi kontak dalam card yang lebih menarik -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-info">
                        <!-- Alamat sekolah -->
                        <div class="mb-4">
                            <i class="fas fa-map-marker-alt fa-2x mb-3 text-warning"></i>
                            <h5 class="fw-bold">Alamat Sekolah</h5>
                            <p class="fs-5 mb-0">{{ $sekolah->alamat }}</p>
                        </div>

                        <!-- Kontak telepon -->
                        <div class="mb-4">
                            <i class="fas fa-phone fa-2x mb-3 text-success"></i>
                            <h5 class="fw-bold">Telepon</h5>
                            <p class="fs-5 mb-0">{{ $sekolah->kontak }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Link media sosial -->
            <div class="mt-5">
                <h4 class="mb-4">Ikuti Kami di Media Sosial</h4>
                <div class="social-links">
                    <a href="#" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer: Bagian bawah website -->
    <footer class="py-4 bg-dark text-white text-center">
        <div class="container">
            <!-- Hak cipta -->
            <p class="mb-0">&copy; {{ date('Y') }} {{ $sekolah->name_sekolah }}. Semua hak dilindungi.</p>
        </div>
    </footer>

    <!-- Navigasi Mobile: Tampil hanya di perangkat mobile -->
    <nav class="mobile-nav">
        <a href="#home" class="nav-link active">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        <a href="#tentang" class="nav-link">
            <i class="fas fa-info-circle"></i>
            <span>Tentang</span>
        </a>
        <a href="#ekskul" class="nav-link">
            <i class="fas fa-futbol"></i>
            <span>Ekskul</span>
        </a>
        <a href="#berita" class="nav-link">
            <i class="fas fa-newspaper"></i>
            <span>Berita</span>
        </a>
        <a href="#kontak" class="nav-link">
            <i class="fas fa-envelope"></i>
            <span>Kontak</span>
        </a>
    </nav>

    <!-- JavaScript Bootstrap (hanya untuk komponen seperti carousel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
