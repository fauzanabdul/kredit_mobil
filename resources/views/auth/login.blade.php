<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login SiToko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #3498db;
            --dark-blue: #2980b9;
            --light-blue: #e8f4fc;
            --text-dark: #2c3e50;
            --text-medium: #34495e;
            --text-light: #7f8c8d;
        }
        
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(135deg, #f5f7fa 0%, #e8f4fc 100%);
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 25px rgba(52, 152, 219, 0.15);
            background-color: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid var(--primary-blue);
        }
        .login-card:hover {
            box-shadow: 0 6px 30px rgba(52, 152, 219, 0.2);
            transform: translateY(-2px);
        }
        .login-title {
            font-weight: 600;
            margin-bottom: 1.8rem;
            color: var(--text-dark);
            font-size: 1.8rem;
            position: relative;
        }
        .login-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary-blue);
            border-radius: 3px;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-medium);
        }
        .btn-primary {
            background-color: var(--primary-blue);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: var(--dark-blue);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }
        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        .form-text {
            color: var(--text-light);
            font-size: 0.85rem;
        }
        .input-icon {
            position: relative;
        }
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-blue);
        }
        .input-icon input {
            padding-left: 40px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .logo-img {
            height: 80px;
            margin-bottom: 1rem;
        }
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-top: 0.5rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="login-card">
        <!-- Logo Section -->
        <div class="logo-container">
           <img src="assets/sitoko.png" alt="SiToko Logo" class="logo-img">
        </div>

        <h3 class="text-center login-title">Login</h3>

        {{-- Tampilkan pesan error jika login gagal --}}
        @if ($errors->has('login'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('login') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4 input-icon">
                <label for="email" class="form-label">Email</label>
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                <div class="form-text mt-1">Gunakan email yang terdaftar</div>
            </div>

            <div class="mb-4 input-icon">
                <label for="password" class="form-label">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                <div class="form-text mt-1">Minimal 8 karakter</div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 mt-2">
                <span class="fw-medium">Masuk</span>
                <i class="fas fa-arrow-right ms-2"></i>
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>