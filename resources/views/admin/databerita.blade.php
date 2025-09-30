@extends('admin.template')

@section('content')
<div class="container py-5">
    <a href="{{route('admin.berita.add')}}" class="btn btn-primary">tambah</a>
    <h2 class="text-center mb-4">Daftar Berita</h2>
    <div class="row g-4">
        @csrf
        @foreach($berita as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm rounded-4">
                    <img src="{{ asset('storage/berita/' . $item->gambar) }}"
                         class="card-img-top rounded-top-4"
                         alt="{{ $item->judul }}" style="height:200px; object-fit:cover;">

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text text-truncate" style="max-height:60px;">
                            {{ Str::limit($item->isi, 100) }}
                        </p>
                    </div>

                    <div class="card-footer d-flex justify-content-between small text-muted">
                        <span>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
                        <span>By {{ $item->user->name }}</span>
                    </div>

                    <div class="p-3">
                        <a href="{{ route('admin.berita.show', $item->id) }}" class="btn btn-sm btn-primary w-100">
                            Baca Selengkapnya
                        </a>
                    </div>

                    <div class="p-2">
                        <a href="{{route('admin.berita.delete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">hapus</a>
                        <a href="{{route('admin.berita.edit',$item->id)}}" class="btn btn-primary">edit</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
