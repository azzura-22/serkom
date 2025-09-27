<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0e6ad3f.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow-lg p-4" style="width: 350px; border-radius: 15px;">
    <div class="text-center mb-4">
      <i class="fa-solid fa-circle-user fa-4x text-secondary"></i>
      <h3 class="mt-2">Login</h3>
    </div>

    <form action="/login" method="POST">
        @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>

</body>
</html>
