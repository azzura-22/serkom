@extends('operator.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-lg rounded-4">
          <div class="card-header bg-warning text-white text-center rounded-top-4">
            <h4 class="mb-0">Edit Data Guru</h4>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('operator.updateguru', $guru->id) }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="name_guru" class="form-label">Nama Guru</label>
                <input type="text" id="name_guru" name="name_guru"
                       class="form-control"
                       value="{{ old('name_guru', $guru->name_guru) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" id="nip" name="nip"
                       class="form-control"
                       value="{{ old('nip', $guru->nip) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="mapel" class="form-label">Mata Pelajaran</label>
                <input type="text" id="mapel" name="mapel"
                       class="form-control"
                       value="{{ old('mapel', $guru->mapel) }}"
                       required>
              </div>

              <div class="mb-3">
                <label for="foto" class="form-label">Foto Guru</label>
                <input type="file" id="foto" name="foto" class="form-control">
                @if($guru->foto)
                  <div class="mt-2">
                    <img src="{{ asset('storage/fotoguru/'.$guru->foto) }}"
                         alt="Foto Guru"
                         width="100" class="rounded">
                  </div>
                @endif
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('operator.guru') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-warning text-white">Update</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
