@extends('admin.template')
@section('content')
<div class="container mt-4">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible" style="margin-block:20px">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <a href="/admin/guru/add" class="btn btn-primary">tambah</a>
  <h3 class="text-center mb-3">Daftar Guru</h3>
  <div class="table-responsive min-vh-100">
      <table id="example" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th>nip</th>
            <th>actiion</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($guru as $item )
          <tr>
            <td>{{$item->name_guru}}</td>
            <td>{{$item->mapel}}</td>
            <td>{{$item->nip}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('admin.editguru', Crypt::encrypt($item->id))}}">ubah</a>
                <a class="btn btn-danger" href="{{route('guru.delete', Crypt::encrypt($item->id))}}" onclick="return confirm('Yakin ingin menghapus data ini?')">delete</a>
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
