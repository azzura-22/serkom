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
                </div>
            </div>
            <div class="card">
                <div class="card">
                    <div class="container-fluid d-flex justify-content-center align-items-center">
                        <h3 class="me-2">murid</h3>
                        <i class="fa-solid fa-circle-user" style="font-size: 30px;"></i>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <h3 class="me-2">foto</h3>
                    <i class="fa-solid fa-image" style="font-size: 30px;"></i>
                </div>
            </div>
            </div>
            <div class="card">
                <div class="card">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <h3 class="me-2">extrakulikuler</h3>
                    <i class="fa-solid fa-face-smile" style="font-size: 30px;"></i>
                </div>
            </div>
            </div>
        </div>

        <h2>Berita Terbaru</h2>
        <table>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
        </table>
    </div>
</div>
</body>
</html>


@endsection
