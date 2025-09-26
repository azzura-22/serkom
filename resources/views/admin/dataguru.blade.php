@extends('admin.template')
@section('content')
<div class="container mt-4">
  <h3 class="text-center mb-3">Daftar Guru</h3>
  <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Pelajaran</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Budi Santoso</td>
        <td>Matematika</td>
        <td>budi@example.com</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Siti Aminah</td>
        <td>Bahasa Indonesia</td>
        <td>siti@example.com</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Andi Wijaya</td>
        <td>IPA</td>
        <td>andi@example.com</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
