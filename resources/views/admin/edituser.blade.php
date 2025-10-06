@extends('admin.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-lg rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Edit Data User</h4>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('admin.user.update', Crypt::encrypt($user->id)) }}" method="POST">
              @csrf

              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name"
                       class="form-control"
                       value="{{ old('name', $user->name) }}"
                       placeholder="Masukkan nama lengkap"
                       required>
              </div>

              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username"
                       class="form-control"
                       value="{{ old('username', $user->username) }}"
                       placeholder="Masukkan username"
                       required>
              </div>

              <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select id="level" name="level" class="form-control" required>
                  <option value="">-- Pilih Level --</option>
                  <option value="admin" {{ old('level', $user->level) == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="operator" {{ old('level', $user->level) == 'operator' ? 'selected' : '' }}>Operator</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah)</label>
                <input type="password" id="password" name="password"
                       class="form-control"
                       placeholder="Masukkan password baru">
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('admin.user') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</div>
@endsection
