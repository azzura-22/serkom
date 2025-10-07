@extends('user.template')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru - {{ $sekolah->name_sekolah ?? 'Sekolah' }}</title>
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

        .baner-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }

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

        .teacher-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            background: white;
        }

        .teacher-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .teacher-img {
            height: 250px;
            object-fit: cover;
            border-bottom: 3px solid var(--secondary-color);
            transition: transform 0.3s ease;
        }

        .teacher-card:hover .teacher-img {
            transform: scale(1.05);
        }

        .teacher-subject {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
        }

        .teacher-nip {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .no-teachers {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .no-teachers i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        .mapel-badge {
            background: var(--secondary-color);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin: 5px;
        }

        .mapel-badge:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .mapel-badge.active {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .baner-section {
                padding: 80px 0;
            }

            .teacher-img {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- baner Section -->
    <section class="baner-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Guru & Tenaga Pendidik</h1>
                    <p class="lead mb-4">Meet our dedicated teaching staff who are committed to providing quality education</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Staf Pengajar Kami</h2>

            <!-- Filter by Mapel -->
            <div class="text-center mb-5">
                <h5 class="mb-3">Filter Berdasarkan Mata Pelajaran:</h5>
                <div>
                    <a href="?mapel=all" class="mapel-badge {{ !request('mapel') || request('mapel') == 'all' ? 'active' : '' }}">
                        Semua Guru
                    </a>
                    @foreach($mapelList as $mapel)
                        <a href="?mapel={{ urlencode($mapel) }}"
                           class="mapel-badge {{ request('mapel') == $mapel ? 'active' : '' }}">
                            {{ $mapel }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Teachers Counter -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Menampilkan <strong>{{ $gurus->count() }}</strong> guru
                        @if(request('mapel') && request('mapel') != 'all')
                            untuk mata pelajaran <strong>{{ request('mapel') }}</strong>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Teachers Grid -->
            <div class="row g-4">
                @forelse($gurus as $guru)
                    <div class="col-lg-4 col-md-6">
                        <div class="teacher-card h-100">
                            <!-- PERBAIKAN: Gunakan path yang konsisten -->
                            @if($guru->foto && Storage::exists('public/gurus/' . $guru->foto))
                                <img src="{{ asset('storage/gurus/' . $guru->foto) }}"
                                     class="card-img-top teacher-img"
                                     alt="{{ $guru->name_guru }}">
                            @elseif($guru->foto && Storage::exists('public/fotoguru/' . $guru->foto))
                                <img src="{{ asset('storage/fotoguru/' . $guru->foto) }}"
                                     class="card-img-top teacher-img"
                                     alt="{{ $guru->name_guru }}">
                            @else
                                <img src="https://via.placeholder.com/300x300/2c3e50/ffffff?text={{ substr($guru->name_guru, 0, 1) }}"
                                     class="card-img-top teacher-img"
                                     alt="{{ $guru->name_guru }}">
                            @endif
                            <div class="card-body text-center p-4">
                                <h5 class="card-title fw-bold mb-2">{{ $guru->name_guru }}</h5>
                                <p class="teacher-nip mb-3">
                                    <i class="fas fa-id-card me-1"></i>NIP: {{ $guru->nip }}
                                </p>
                                <span class="teacher-subject mb-3">
                                    <i class="fas fa-book me-1"></i>{{ $guru->mapel }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-teachers">
                            <i class="fas fa-users"></i>
                            <h4>Data Guru Belum Tersedia</h4>
                            <p class="mb-4">Informasi tentang staf pengajar akan segera diupdate.</p>
                            <a href="{{ url('/user') }}" class="btn btn-primary">
                                <i class="fas fa-home me-1"></i>Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">
                &copy; {{ date('Y') }} {{ $sekolah->name_sekolah ?? 'Sekolah' }}.
                Total Guru: {{ $totalGurus }} |
                Mata Pelajaran: {{ $mapelList->count() }}
            </p>
        </div>
    </footer>
@endsection
