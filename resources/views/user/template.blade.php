<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul halaman, fallback ke nama sekolah atau 'Website Sekolah' -->
    <title>{{ $title ?? $sekolah->name_sekolah ?? 'Website Sekolah' }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variabel warna utama */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }

        /* Styling navbar */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2530 100%) !important;
            padding: 15px 0;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Navbar saat discroll */
        .navbar.scrolled {
            padding: 10px 0;
            background: rgba(44, 62, 80, 0.95) !important;
            backdrop-filter: blur(10px);
        }

        /* Brand sekolah */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            color: var(--secondary-color);
            margin-right: 10px;
        }

        /* Link navigasi */
        .nav-link {
            font-weight: 500;
            margin: 0 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 15px !important;
        }

        /* Hover efek pada nav-link */
        .nav-link:not(.active):hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        /* Nav-link aktif */
        .nav-link.active {
            background-color: var(--secondary-color);
            color: white !important;
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        }

        /* Garis bawah animasi pada nav-link */
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--secondary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 80%;
        }

        /* Tombol toggler navbar (mobile) */
        .navbar-toggler {
            border: none;
            padding: 5px 10px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Ikon toggler custom */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Badge notifikasi */
        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: translate(25%, -25%);
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .dropdown-item {
            color: rgba(255,255,255,0.8);
            padding: 8px 15px;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        /* Responsive styling untuk mobile */
        @media (max-width: 991px) {
            .navbar-collapse {
                margin-top: 15px;
                padding: 15px;
                background-color: rgba(44, 62, 80, 0.95);
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }

            .nav-link {
                margin: 5px 0;
                padding: 10px 15px !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar utama -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <!-- Brand/logo sekolah -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-graduation-cap"></i>
                {{ $sekolah->name_sekolah ?? 'Sekolah' }}
            </a>

            <!-- Toggler untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Link Beranda -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}"
                           href="{{ route('user') }}">
                           <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>

                    <!-- Link Galeri -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri.user') ? 'active' : '' }}"
                           href="{{ route('galeri.user') }}">
                           <i class="fas fa-image me-1"></i> Galeri
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ektra.user') ? 'active' : '' }}"
                            href="{{ route('ektra.user') }}">
                            <i class="fas fa-school me-1"></i> Ekstrakulikuler
                        </a>
                    </li>

                    <!-- Link Berita Saya -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}"
                           href="{{ route('berita') }}">
                           <i class="fas fa-newspaper me-1"></i> Berita Saya
                        </a>
                    </li>

                    <!-- Link Guru -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('guru.index') ? 'active' : '' }}"
                            href="{{ route('guru.index') }}">
                            <i class="fa-regular fa-user"></i> Guru
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('siswa') ? 'active' : '' }}"
                            href="{{ route('siswa') }}">
                            <i class="fa-regular fa-user"></i> Siswa
                        </a>
                    </li>

                    <!-- Link Profil Sekolah -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                            href="{{ route('profile') }}">
                            <i class="fas fa-school me-1"></i> Profil Sekolah
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <main class="py-4" style="padding-top: 80px !important;">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efek scroll pada navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Aktifkan dropdown-item sesuai URL
        document.querySelectorAll('.dropdown-item').forEach(item => {
            if (item.href === window.location.href) {
                item.classList.add('active');
            }
        });

        // Tutup navbar saat link diklik (untuk mobile)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    const navbarToggler = document.querySelector('.navbar-toggler');
                    navbarToggler.click();
                }
            });
        });
    </script>
</body>
</html>
