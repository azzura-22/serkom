@extends('admin.template')
@section('content')
<div class="container mt-4">
    <a href="{{ route('admin.adduser') }}" class="btn btn-primary mb-3">Tambah User</a>
    <h3 class="text-center mb-3">Daftar User</h3>
    <div class="table-responsive min-vh-100">

        <table id="example" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        @if($user->level == 'admin')
                            <span class="badge bg-primary">Admin</span>
                        @else
                            <span class="badge bg-success">Operator</span>
                        @endif
                    </td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('admin.edit.user', Crypt::encrypt($user->id)) }}">Ubah</a>
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.delete.user', Crypt::encrypt($user->id)) }}" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
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
