@extends('admin.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-lg rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Edit Data Siswa</h4>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('operator.updatesiswa', $siswa->id) }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" id="nama" name="nama"
                       class="form-control"
                       value="{{ old('nama', $siswa->nama) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" id="nisn" name="nisn"
                       class="form-control"
                       value="{{ old('nisn', $siswa->nisn) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                  <option value="">-- Pilih Jenis Kelamin --</option>
                  <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                  <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="number" id="tahun_masuk" name="tahun_masuk"
                       class="form-control"
                       min="2000" max="{{ date('Y') }}"
                       value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                       required>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('operator.siswa') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
