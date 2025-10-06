@extends('operator.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card shadow-lg rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Edit Data Galeri</h4>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('operator.updategaleri', $galeri->id) }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" id="judul" name="judul"
                       class="form-control"
                       value="{{ old('judul', $galeri->judul) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea id="keterangan" name="keterangan"
                          class="form-control" rows="4"
                          required>{{ old('keterangan', $galeri->keterangan) }}</textarea>
              </div>

              <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" id="file" name="file" class="form-control">
                @if($galeri->file)
                  <div class="mt-2">
                    @if($galeri->kategori == 'foto')
                      <img src="{{ asset('storage/galeri/' . $galeri->file) }}"
                           alt="Gambar Galeri"
                           width="150" class="rounded">
                    @elseif($galeri->kategori == 'vidio')
                      <video width="250" controls class="rounded">
                        <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                        Browser Anda tidak mendukung video.
                      </video>
                    @endif
                  </div>
                @endif
              </div>

              <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select id="kategori" name="kategori" class="form-select" required>
                  <option value="foto" {{ old('kategori', $galeri->kategori) == 'foto' ? 'selected' : '' }}>Foto</option>
                  <option value="vidio" {{ old('kategori', $galeri->kategori) == 'vidio' ? 'selected' : '' }}>Vidio</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal"
                       class="form-control"
                       value="{{ old('tanggal', $galeri->tanggal) }}"
                       required>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('admin.galeri') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
