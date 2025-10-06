@extends('operator.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h4 class="mb-0">Tambah Berita Baru</h4>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('operator.berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Isi -->
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi Berita</label>
                            <textarea id="isi" name="isi" rows="6"
                                      class="form-control @error('isi') is-invalid @enderror"
                                      required></textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal"
                                   class="form-control @error('tanggal') is-invalid @enderror"
                                   required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" id="gambar" name="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   accept="image/*" required>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Pilih User -->
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Penulis</label>
                            <select id="user_id" name="user_id"
                                    class="form-select @error('user_id') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Penulis --</option>
                                @foreach($user as $users)
                                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.berita') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
