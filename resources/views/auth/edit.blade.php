<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna - SiToko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #5E74FF;
            --primary-light: rgba(94, 116, 255, 0.1);
            --primary-dark: #4a5ecc;
            --text-dark: #2c3e50;
            --text-medium: #5c6c7d;
            --text-light: #95a5a6;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .form-container {
            max-width: 700px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            background-color: white;
            border-top: 3px solid var(--primary);
        }
        
        .form-title {
            color: var(--text-dark);
            border-bottom: 1px solid rgba(0,0,0,0.1);
            padding-bottom: 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        
        .form-title i {
            color: var(--primary);
            margin-right: 12px;
            font-size: 1.8rem;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--text-medium);
            margin-bottom: 8px;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(94, 116, 255, 0.25);
        }
        
        .btn-action {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-action i {
            margin-right: 8px;
        }
        
        .alert-danger {
            border-left: 4px solid #dc3545;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="form-container">
            <div class="form-title">
                <i class="fas fa-user-edit"></i>
                <h2 class="m-0">Edit Pengguna</h2>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong><i class="fas fa-exclamation-circle"></i> Oops!</strong> Ada kesalahan saat input data:
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('pengguna.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" 
                           value="{{ old('name', $user->name) }}" required
                           placeholder="Masukkan nama lengkap pengguna">
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" 
                           value="{{ old('email', $user->email) }}" required
                           placeholder="Masukkan alamat email valid">
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('pengguna') }}" class="btn btn-outline-primary btn-action">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-action">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>