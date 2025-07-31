<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8fa0ddbd2b.js" crossorigin="anonymous"></script>
    <style>
        .form-container {
            max-width: 700px;
            margin: 0 auto;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: 500;
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
        }
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="form-container">
        <a href="{{ route('pengguna') }}" class="btn btn-outline-secondary mb-4">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Pendataan
        </a>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>Tambah Pengguna Baru</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('register_user') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label">Role</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="">Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" id="password" class="form-control" required minlength="6">
                            </div>
                            <small class="text-muted">Minimal 6 karakter</small>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required minlength="6">
                            </div>
                        </div>
                    </div>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Pengguna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>