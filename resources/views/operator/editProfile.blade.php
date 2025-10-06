@extends('operator.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card shadow-lg rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Edit Profil Sekolah</h4>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('operator.profile.update', Crypt::encrypt( $sekolah->id)) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="name_sekolah" class="form-label">Nama Sekolah</label>
                <input type="text" id="name_sekolah" name="name_sekolah"
                       class="form-control"
                       value="{{ old('name_sekolah', $sekolah->name_sekolah) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="kepalasekolah" class="form-label">Kepala Sekolah</label>
                <input type="text" id="kepalasekolah" name="kepalasekolah"
                       class="form-control"
                       value="{{ old('kepalasekolah', $sekolah->kepalasekolah) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="npsn" class="form-label">NPSN</label>
                <input type="text" id="npsn" name="npsn"
                       class="form-control"
                       value="{{ old('npsn', $sekolah->npsn) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="2" required>{{ old('alamat', $sekolah->alamat) }}</textarea>
              </div>

              <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" id="kontak" name="kontak"
                       class="form-control"
                       value="{{ old('kontak', $sekolah->kontak) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="visi_misi" class="form-label">Visi & Misi</label>
                <textarea id="visi_misi" name="visi_misi" class="form-control" rows="3" required>{{ old('visi_misi', $sekolah->visi_misi) }}</textarea>
              </div>

              <div class="mb-3">
                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                <input type="text" id="tahun_berdiri" name="tahun_berdiri"
                       class="form-control"
                       value="{{ old('tahun_berdiri', $sekolah->tahun_berdiri) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi', $sekolah->deskripsi) }}</textarea>
              </div>

              <div class="mb-3">
                <label for="foto" class="form-label">Foto Sekolah</label>
                <input type="file" id="foto" name="foto" class="form-control">
                @if($sekolah->foto)
                  <div class="mt-2">
                    <img src="{{ asset('storage/sekolah/'.$sekolah->foto) }}"
                         alt="Foto Sekolah"
                         width="120" class="rounded">
                  </div>
                @endif
              </div>

              <div class="mb-3">
                <label for="logo" class="form-label">Logo Sekolah</label>
                <input type="file" id="logo" name="logo" class="form-control">
                @if($sekolah->logo)
                  <div class="mt-2">
                    <img src="{{ asset('storage/sekolah/'.$sekolah->logo) }}"
                         alt="Logo Sekolah"
                         width="100" class="rounded">
                  </div>
                @endif
              </div>

              <div class="mb-3">
                <label for="Fotokepalasekolah" class="form-label">Foto Kepala Sekolah</label>
                <input type="file" id="Fotokepalasekolah" name="Fotokepalasekolah" class="form-control">
                @if($sekolah->Fotokepalasekolah)
                  <div class="mt-2">
                    <img src="{{ asset('storage/sekolah/'.$sekolah->Fotokepalasekolah) }}"
                         alt="Foto Kepala Sekolah"
                         width="120" class="rounded">
                  </div>
                @endif
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('operator.profile') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary text-white">Update Profil</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
