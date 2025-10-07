@extends('user.template')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - {{ $sekolah->name_sekolah ?? 'Sekolah' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
        }

        .baner-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
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
            background: var(--secondary-color);
            border-radius: 2px;
        }

        .ekstra-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            background: white;
        }

        .ekstra-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .ekstra-img {
            height: 250px;
            object-fit: cover;
            border-bottom: 3px solid var(--secondary-color);
            transition: transform 0.3s ease;
        }

        .ekstra-card:hover .ekstra-img {
            transform: scale(1.05);
        }

        .badge-jadwal {
            background: var(--secondary-color);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .no-ekstra {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .no-ekstra i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        @media (max-width: 768px) {
            .baner-section {
                padding: 80px 0;
            }

            .ekstra-img {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Banner Section -->
    <section class="baner-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Kegiatan Ekstrakurikuler</h1>
            <p class="lead mb-0">Temukan beragam kegiatan seru dan bermanfaat yang ada di {{ $sekolah->name_sekolah ?? 'Sekolah Kami' }}</p>
        </div>
    </section>

    <!-- Ekstrakurikuler Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Daftar Ekstrakurikuler</h2>

            <div class="row g-4">
                @forelse($ekstras as $ekstra)
                    <div class="col-lg-4 col-md-6">
                        <div class="ekstra-card h-100">
                            @if($ekstra->gambar && Storage::exists('public/fotoextra/' . $ekstra->gambar))
                                <img src="{{ asset('storage/fotoextra/' . $ekstra->gambar) }}"
                                     class="card-img-top ekstra-img"
                                     alt="{{ $ekstra->name_ekstra }}">
                            @else
                                <img src="https://via.placeholder.com/300x200/2c3e50/ffffff?text={{ substr($ekstra->name_ekstra, 0, 1) }}"
                                     class="card-img-top ekstra-img"
                                     alt="{{ $ekstra->name_ekstra }}">
                            @endif

                            <div class="card-body text-center p-4">
                                <h5 class="fw-bold mb-2">{{ $ekstra->name_ekstra }}</h5>
                                <p class="text-muted mb-2">
                                    <i class="fas fa-user-tie me-1"></i>Pembina: {{ $ekstra->pembina }}
                                </p>
                                <span class="badge-jadwal mb-3 d-inline-block">
                                    <i class="fas fa-calendar-day me-1"></i>{{ $ekstra->jadwal_latihan }}
                                </span>
                                <p class="mt-3 text-secondary">{{ Str::limit($ekstra->deskripsi, 100, '...') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-ekstra">
                            <i class="fas fa-futbol"></i>
                            <h4>Data Ekstrakurikuler Belum Tersedia</h4>
                            <p class="mb-4">Informasi kegiatan akan segera diperbarui.</p>
                            <a href="{{ url('/user') }}" class="btn btn-success">
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
                &copy; {{ date('Y') }} {{ $sekolah->name_sekolah ?? 'Sekolah' }} |
                Total Ekstrakurikuler: {{ $totalEkstra }}
            </p>
        </div>
    </footer>
@endsection
