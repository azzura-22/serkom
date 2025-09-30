@extends('admin.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h4 class="mb-0">Tambah Galeri Baru</h4>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('admin.storegaleri') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" rows="3"
                                      class="form-control"
                                      required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">File (Foto / Video)</label>
                            <input type="file" id="file" name="file"
                                   class="form-control"
                                   accept="image/*,video/*" required>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select id="kategori" name="kategori"
                                    class="form-select"
                                    required>
                                <option value="foto">Foto</option>
                                <option value="vidio">Video</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.galeri') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
