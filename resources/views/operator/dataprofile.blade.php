@extends('operator.template')
@section('content')
<div class="container mt-4">
  <h3 class="text-center mb-3">Profil Sekolah</h3>
  <div class="table-responsive min-vh-100">

      <table id="example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Nama Sekolah</th>
            <th>Kepala Sekolah</th>
            <th>Foto</th>
            <th>Logo</th>
            <th>NPSN</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Visi Misi</th>
            <th>Tahun Berdiri</th>
            <th>Deskripsi</th>
            <th>Foto Kepala Sekolah</th>
            <th>aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $sekolah->name_sekolah }}</td>
            <td>{{ $sekolah->kepalasekolah }}</td>
            <td>
              <img src="{{ asset('storage/sekolah/' . $sekolah->foto) }}"
                   width="120" class="img-thumbnail" alt="Foto Sekolah">
            </td>
            <td>
              <img src="{{ asset('storage/sekolah/' . $sekolah->logo) }}"
                   width="80" class="img-thumbnail" alt="Logo Sekolah">
            </td>
            <td>{{ $sekolah->npsn }}</td>
            <td>{{ $sekolah->alamat }}</td>
            <td>{{ $sekolah->kontak }}</td>
            <td>{{ $sekolah->visi_misi }}</td>
            <td>{{ $sekolah->tahun_berdiri }}</td>
            <td>{{ $sekolah->deskripsi }}</td>
            <td>
              <img src="{{ asset('storage/sekolah/' . $sekolah->Fotokepalasekolah) }}"
                   width="120" class="img-thumbnail" alt="Foto Kepala Sekolah">
            </td>
            <td><a href="{{route('operator.profile.edit',Crypt::encrypt($sekolah->id))}}" class="btn btn-warning">edit</a></td>
          </tr>
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
