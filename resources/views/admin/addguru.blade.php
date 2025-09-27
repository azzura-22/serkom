@extends('admin.template')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-lg rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Tambah Data Guru</h4>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('admin.storeguru') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="name_guru" class="form-label">Nama Guru</label>
                <input type="text" id="name_guru" name="name_guru" class="form-control" placeholder="Masukkan nama guru" required>
              </div>

              <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" id="nip" name="nip" class="form-control" placeholder="Masukkan NIP" required>
              </div>

              <div class="mb-3">
                <label for="mapel" class="form-label">Mata Pelajaran</label>
                <input type="text" id="mapel" name="mapel" class="form-control" placeholder="Masukkan mata pelajaran" required>
              </div>

              <div class="mb-3">
                <label for="foto" class="form-label">Foto Guru</label>
                <input type="file" id="foto" name="foto" class="form-control" required>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('admin.guru') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
