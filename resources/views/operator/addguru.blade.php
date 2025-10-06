@extends('operator.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0">Tambah Data Guru</h4>
                </div>
                <div class="card-body p-4">

                    {{-- Form Tambah Guru --}}
                    <form action="{{ route('operator.storeguru') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Guru --}}
                        <div class="mb-3">
                            <label for="name_guru" class="form-label">Nama Guru</label>
                            <input type="text" id="name_guru" name="name_guru"
                                   class="form-control @error('name_guru') is-invalid @enderror"
                                   placeholder="Masukkan nama guru" value="{{ old('name_guru') }}" required>
                            @error('name_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- NIP --}}
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" id="nip" name="nip"
                                   class="form-control @error('nip') is-invalid @enderror"
                                   placeholder="Masukkan NIP" value="{{ old('nip') }}" required>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mata Pelajaran --}}
                        <div class="mb-3">
                            <label for="mapel" class="form-label">Mata Pelajaran</label>
                            <input type="text" id="mapel" name="mapel"
                                   class="form-control @error('mapel') is-invalid @enderror"
                                   placeholder="Masukkan mata pelajaran" value="{{ old('mapel') }}" required>
                            @error('mapel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Foto Guru --}}
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Guru</label>
                            <input type="file" id="foto" name="foto"
                                   class="form-control @error('foto') is-invalid @enderror" required>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('operator.guru') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
