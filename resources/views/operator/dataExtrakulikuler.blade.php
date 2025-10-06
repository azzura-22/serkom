@extends('operator.template')
@section('content')
<div class="container mt-4">
    <a href="{{route('operator.addekstrakulikuler')}}" class="btn btn-primary">Tambah Ekstrakurikuler</a>
    <h3 class="text-center mb-3">Daftar Ekstrakurikuler</h3>
    <div class="table-responsive min-vh-100">

        <table id="example" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Ekstrakurikuler</th>
                    <th>Pembina</th>
                    <th>Jadwal Latihan</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ekstra as $item)
                <tr>
                    <td>{{ $item->name_ekstra }}</td>
                    <td>{{ $item->pembina }}</td>
                    <td>{{ $item->jadwal_latihan }}</td>
                    <td>{{ $item->deksripsi }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/fotoextra/' . $item->gambar) }}" alt="gambar" width="100">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('operator.editekstrakulikuler', Crypt::encrypt($item->id)) }}">Ubah</a>
                        <a class="btn btn-danger" href="{{ route('operator.deleteekstrakulikuler', Crypt::encrypt($item->id)) }}" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    new DataTable('#example',{
        responsive:true
    })
</script>
@endsection
