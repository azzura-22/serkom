@extends('operator.template')
@section('content')
<div class="container mt-4">
    <a href="{{route('operator.addsiswa')}}" class="btn btn-primary">Tambah</a>
    <h3 class="text-center mb-3">Daftar Siswa</h3>
    <div class="table-responsive min-vh-100">
        <table id="example" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>
                        @if($item->jenis_kelamin == 'L')
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                    </td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('operator.editsiswa', Crypt::encrypt($item->id)) }}">Ubah</a>
                        <a class="btn btn-danger" href="{{ route('operator.deletesiswa', Crypt::encrypt($item->id)) }}" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
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
