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

            <form action="{{ route('operator.storesiswa') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="nama" class="form-label">Nama siswa</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama siswa" required>
              </div>

              <div class="mb-3">
                <label for="nisn" class="form-label">nisn</label>
                <input type="text" id="nisn" name="nisn" class="form-control" placeholder="Masukkan nisn" required>
              </div>

              <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="year" class="form-label">tahun masuk</label>
                <input type="year" id="tahun_masuk" name="tahun_masuk" class="form-control" placeholder="Masukkan tahun masuk" required>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('operator.siswa') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
