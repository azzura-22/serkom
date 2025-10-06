<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap & FontAwesome --}}
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome-free-6.7.2-web/css/all.min.css')}}">
    {{-- DataTables & jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css" rel="stylesheet">

    {{-- Custom Styles --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Sidebar styling */
        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        /* Responsive sidebar */
        @media (max-width: 767.98px) {
            .sidebar {
                position: fixed;
                z-index: 1050;
                width: 220px;
                left: -220px;
                top: 0;
                transition: left 0.3s;
                height: 100vh;
            }
            .sidebar.show {
                left: 0;
            }
            .main-content {
                margin-left: 0 !important;
            }
        }
        @media (min-width: 768px) {
            .main-content {
                margin-left: 220px;
            }
        }
        /* Hamburger button */
        .sidebar-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background: #343a40;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            display: none;
        }
        @media (max-width: 767.98px) {
            .sidebar-toggle {
                display: block;
            }
        }
        /* Footer responsive */
        .footer {
            background: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
    {{-- Hamburger button for mobile --}}
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar Navigation --}}
            <nav class="col-md-2 sidebar d-md-block" id="sidebar">
                <div class="py-4 text-center">
                    <h4 class="text-white">Data sekolah</h4>
                </div>
                <ul class="navbar-nav me-auto">
                    {{-- Dashboard --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin')}}" class="nav-link d-flex align-items-center">
                            <i class="fas fa-home me-2" style="font-size: 1rem;"></i>
                            Dashboard
                        </a>
                    </li>
                    {{-- daftar user --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin.user')}}" class="nav-link d-flex align-items-center">
                            <i class="fas fa-users me-2" style="font-size: 1rem;"></i>
                            Daftar user
                        </a>
                    </li>
                    {{-- Daftar siswa --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin.siswa')}}" class="nav-link d-flex align-items-center">
                            <i class="fas fa-users me-2" style="font-size: 1rem;"></i>
                            Daftar siswa
                        </a>
                    </li>
                    {{-- Daftar guru --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin.guru')}}" class="nav-link d-flex align-items-center">
                            <i class="fas fa-users me-2" style="font-size: 1rem;"></i>
                            Daftar guru
                        </a>
                    </li>
                    {{-- Galery --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin.galeri')}}" class="nav-link d-flex align-items-center">
                            <i class="fa-solid fa-image me-2" style="font-size: 1rem;"></i>
                            Galery
                        </a>
                    </li>
                    {{-- Berita --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin.berita')}}" class="nav-link d-flex align-items-center">
                            <i class="fa-solid fa-file me-2" style="font-size: 1rem;"></i>
                            Berita
                        </a>
                    </li>
                    {{-- Extrakulikuler --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin.ekstrakulikuler')}}" class="nav-link d-flex align-items-center">
                            <i class="fa-solid fa-face-smile me-2" style="font-size: 1rem;"></i>
                            Extrakulikuler
                        </a>
                    </li>
                    {{-- ProfileSekolah --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('admin.profile')}}" class="nav-link d-flex align-items-center">
                            <i class="fa-solid fa-eye me-2" style="font-size: 1rem;"></i>
                            ProfileSekolah
                        </a>
                    </li>
                    {{-- Logout --}}
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{route('logout')}}" class="nav-link d-flex align-items-center">
                            <i class="fas fa-sign-out-alt me-2" style="font-size: 1rem;"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
            {{-- Main Content --}}
            <main class="col-md-10 ms-sm-auto px-4 py-4 main-content">
                <h2 class="mb-4">@yield('title')</h2>
                @yield('content')
            </main>
        </div>
    </div>
    {{-- Footer --}}
    <footer class="footer mt-auto py-3 fixed-bottom d-flex justify-content-center">
        <div class="container text-center">
            <span>&copy; {{ date('Y') }} sekolah smp almadinah</span>
        </div>
    </footer>
    {{-- Bootstrap JS --}}
    <script src="{{asset('bootstrap1/js/bootstrap.bundle.min.js')}}"></script>
    {{-- Sidebar toggle script --}}
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        });
        // Close sidebar when clicking outside (mobile)
        document.addEventListener('click', function(e) {
            var sidebar = document.getElementById('sidebar');
            var toggle = document.getElementById('sidebarToggle');
            if(window.innerWidth < 768 && sidebar.classList.contains('show')) {
                if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html>
