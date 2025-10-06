<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome-free-6.7.2-web/css/all.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            position: fixed;
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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 sidebar d-none d-md-block">
            <div class="py-4 text-center">
                <h4 class="text-white">Data sekolah</h4>
            </div>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('admin')}}" class="nav-link d-flex align-items-center">
                                <i class="fas fa-home me-2" style="font-size: 1rem;"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('admin.siswa')}}" class="nav-link d-flex align-items-center">
                                <i class="fas fa-users me-2" style="font-size: 1rem;"></i>
                                Daftar siswa
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('admin.guru')}}" class="nav-link d-flex align-items-center">
                                <i class="fas fa-users me-2" style="font-size: 1rem;"></i>
                                Daftar guru
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('admin.galeri')}}" class="nav-link d-flex align-items-center">
                                <i class="fa-solid fa-image me-2" style="font-size: 1rem;"></i>
                                Galery
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('admin.berita')}}" class="nav-link d-flex align-items-center">
                                <i class="fa-solid fa-file me-2" style="font-size: 1rem;"></i>
                                Berita
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('admin.ekstrakulikuler')}}" class="nav-link d-flex align-items-center">
                                <i class="fa-solid fa-face-smile me-2" style="font-size: 1rem;"></i>
                                Extrakulikuler
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('admin.profile')}}" class="nav-link d-flex align-items-center">
                                <i class="fa-solid fa-eye me-2" style="font-size: 1rem;"></i>
                                ProfileSekolah
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('logout')}}" class="nav-link d-flex align-items-center">
                                <i class="fas fa-sign-out-alt me-2" style="font-size: 1rem;"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
        </nav>
        <main class="col-md-10 ms-sm-auto px-4 py-4">
            <h2 class="mb-4">@yield('title')</h2>
            @yield('content')
        </main>
    </div>
</div>
    <footer class="footer mt-auto py-3 fixed-bottom d-flex justify-content-center">
        <div class="container text-center">
            <span>&copy; {{ date('Y') }} sekolah smp almadinah</span>
        </div>
    </footer>
<script src="{{asset('bootstrap1/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
