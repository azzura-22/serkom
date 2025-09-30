@extends('admin.template')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-lg rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Tambah Data Ekstrakurikuler</h4>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('admin.storeekstrakulikuler') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="name_ekstra" class="form-label">Nama Ekstrakurikuler</label>
                <input type="text" id="name_ekstra" name="name_ekstra" class="form-control" placeholder="Masukkan nama ekstrakurikuler" required>
              </div>

              <div class="mb-3">
                <label for="pembina" class="form-label">Pembina</label>
                <input type="text" id="pembina" name="pembina" class="form-control" placeholder="Masukkan nama pembina" required>
              </div>

              <div class="mb-3">
                <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
                <input type="text" id="jadwal_latihan" name="jadwal_latihan" class="form-control" placeholder="Masukkan jadwal latihan" required>
              </div>

              <div class="mb-3">
                <label for="deksripsi" class="form-label">Deskripsi</label>
                <textarea id="deksripsi" name="deksripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi ekstrakurikuler" required></textarea>
              </div>

              <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" id="gambar" name="gambar" class="form-control" required>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('admin.ekstrakulikuler') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
