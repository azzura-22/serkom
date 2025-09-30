@extends('admin.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-warning text-dark text-center rounded-top-4">
                    <h4 class="mb-0">Edit Berita</h4>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ $berita->judul }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi Berita</label>
                            <textarea id="isi" name="isi" rows="6"
                                      class="form-control @error('isi') is-invalid @enderror"
                                      required>{{ $berita->isi }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ $berita->tanggal }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" id="gambar" name="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   accept="image/*">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if($berita->gambar)
                                <div class="mt-2">
                                    <p>Gambar saat ini:</p>
                                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                                         alt="gambar lama" class="img-thumbnail" style="max-height:150px;">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Penulis</label>
                            <select id="user_id" name="user_id"
                                    class="form-select @error('user_id') is-invalid @enderror"
                                    required>
                                <option value="">-- Pilih Penulis --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                            {{ $berita->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.berita') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
