@extends('user.template')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - {{ $sekolah->name_sekolah ?? 'Sekolah' }}</title>
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
            background-color: var(--light-color);
        }

        .banner-section {
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

        .student-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            background: white;
        }

        .student-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .student-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }

        .student-info {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .no-data {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .no-data i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        @media (max-width: 768px) {
            .banner-section {
                padding: 80px 0;
            }
        }
    </style>
</head>
<body>

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Data Siswa</h1>
            <p class="lead mb-0">Daftar lengkap siswa di {{ $sekolah->name_sekolah ?? 'Sekolah Kami' }}</p>
        </div>
    </section>

    <!-- Siswa Section -->
    <section class="py-5">
        <div class="container">
            {{-- <h2 class="section-title">Siswa Kami</h2> --}}

            <!-- Info Jumlah -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Menampilkan <strong>{{ $siswa->count() }}</strong> siswa terdaftar.
                    </div>
                </div>
            </div>

            <!-- Tabel Data Lengkap -->
            @if($siswa->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="section-title">Daftar Lengkap Siswa</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tahun Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < count($siswa); $i++)
                                    <tr class="text-center">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $siswa[$i]->nama }}</td>
                                        <td>{{ $siswa[$i]->nisn }}</td>
                                        <td>{{ $siswa[$i]->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>{{ $siswa[$i]->tahun_masuk }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} {{ $sekolah->name_sekolah ?? 'Sekolah' }}. Semua hak dilindungi.</p>
        </div>
    </footer>
@endsection
