@extends('admin.template')
@section('content')<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        header {
            background: #0056b3;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            display: flex;
        }
        nav {
            width: 200px;
            background: #333;
            color: white;
            min-height: 100vh;
            padding: 15px;
        }
        nav a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 10px 0;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #0056b3;
            color: white;
        }
        .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .card {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: white;
        border-radius: 20px;
        text-align: center;
        padding: 25px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .card h3 {
        margin: 10px 0;
    }

    /* Warna berbeda per kartu */
    .card.guru {
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
    }

    .card.murid {
        background: linear-gradient(135deg, #43cea2, #185a9d);
    }

    .card.galeri {
        background: linear-gradient(135deg, #f7971e, #ffd200);
    }

    .card.eks {
        background: linear-gradient(135deg, #11998e, #38ef7d);
    }

    i {
        font-size: 35px;
        margin-left: 8px;
    }
    a{
        text-decoration: none;
        color: white
    }
    </style>
</head>
<body>
<header>
    <h1>Dashboard Admin Sekolah</h1>
</header>
<div class="container">
    <div class="content">
        <h2>Data Ringkasan</h2>
        <div class="cards">
            <div class="card">
                <div class="card">
                    <div class="container-fluid d-flex justify-content-center align-items-center">
                        <h3 class="me-2">Guru</h3>
                        <i class="fa-solid fa-circle-user" style="font-size: 30px;"></i>
                    </div>
                    <h3>{{$guru->count()}}</h3>
                </div>
            </div>
            <div class="card">
                <div class="card">
                    <div class="container-fluid d-flex justify-content-center align-items-center">
                        <h3 class="me-2">murid</h3>
                        <i class="fa-solid fa-circle-user" style="font-size: 30px;"></i>
                    </div>
                    <h3>{{$siswa->count()}}</h3>
                </div>
            </div>
            <div class="card">
                <div class="card">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <a href="{{ route('admin.galeri') }}" ><h3 class="me-2">galeri</h3></a>
                    <i class="fa-solid fa-image" style="font-size: 30px;"></i>
                </div>
                <h3>{{$galeri->count()}}</h3>
            </div>
            </div>
            <div class="card">
                <div class="card">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <h3 class="me-2">extrakulikuler</h3>
                    <i class="fa-solid fa-face-smile" style="font-size: 30px;"></i>
                </div>
                <h3>{{$eks->count()}}</h3>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


@endsection
