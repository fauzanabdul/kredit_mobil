<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login SiToko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        /* Animasi Loading */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .loading-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        /* Opsi 1: Dot Pulse */
        .dot-pulse {
            position: relative;
            left: -9999px;
            width: 10px;
            height: 10px;
            border-radius: 5px;
            background-color: var(--primary-blue);
            color: var(--primary-blue);
            box-shadow: 9999px 0 0 -5px;
            animation: dot-pulse 1.5s infinite linear;
            animation-delay: 0.25s;
        }

        .dot-pulse::before, .dot-pulse::after {
            content: "";
            display: inline-block;
            position: absolute;
            top: 0;
            width: 10px;
            height: 10px;
            border-radius: 5px;
            background-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .dot-pulse::before {
            box-shadow: 9984px 0 0 -5px;
            animation: dot-pulse-before 1.5s infinite linear;
            animation-delay: 0s;
        }

        .dot-pulse::after {
            box-shadow: 10014px 0 0 -5px;
            animation: dot-pulse-after 1.5s infinite linear;
            animation-delay: 0.5s;
        }

        @keyframes dot-pulse-before {
            0% {
                box-shadow: 9984px 0 0 -5px;
            }
            30% {
                box-shadow: 9984px 0 0 2px;
            }
            60%, 100% {
                box-shadow: 9984px 0 0 -5px;
            }
        }

        @keyframes dot-pulse {
            0% {
                box-shadow: 9999px 0 0 -5px;
            }
            30% {
                box-shadow: 9999px 0 0 2px;
            }
            60%, 100% {
                box-shadow: 9999px 0 0 -5px;
            }
        }

        @keyframes dot-pulse-after {
            0% {
                box-shadow: 10014px 0 0 -5px;
            }
            30% {
                box-shadow: 10014px 0 0 2px;
            }
            60%, 100% {
                box-shadow: 10014px 0 0 -5px;
            }
        }

        /* Opsi 2: Spinner */
        .spinner {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: radial-gradient(farthest-side, var(--primary-blue) 94%, #0000) top/9px 9px no-repeat,
                        conic-gradient(#0000 30%, var(--primary-blue));
            -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 9px), #000 0);
            animation: spinner 1s infinite linear;
        }

        @keyframes spinner {
            100% {
                transform: rotate(1turn);
            }
        }

        /* Opsi 3: Bouncing Dots */
        .bouncing-dots {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 17px;
        }

        .bouncing-dots div {
            width: 12px;
            height: 12px;
            background-color: var(--primary-blue);
            border-radius: 50%;
            display: inline-block;
            animation: bouncing-dots 1.4s infinite ease-in-out both;
        }

        .bouncing-dots div:nth-child(1) {
            animation-delay: -0.32s;
        }

        .bouncing-dots div:nth-child(2) {
            animation-delay: -0.16s;
        }

        @keyframes bouncing-dots {
            0%, 80%, 100% { 
                transform: scale(0);
            } 40% { 
                transform: scale(1);
            }
        }

        /* Opsi 4: Infinity Loader */
        .infinity-loader {
            width: 120px;
            height: 22px;
            background: linear-gradient(var(--primary-blue) 0 0) left -40px top 0/40px 100% no-repeat,
                        linear-gradient(var(--primary-blue) 0 0) right -40px top 0/40px 100% no-repeat;
            position: relative;
            animation: infinity-loader 2s infinite;
        }

        .infinity-loader:before {
            content: "";
            position: absolute;
            width: 40px;
            height: 22px;
            background: var(--primary-blue);
            left: 0;
            top: 0;
            animation: infinity-loader-left 2s infinite;
        }

        .infinity-loader:after {
            content: "";
            position: absolute;
            width: 40px;
            height: 22px;
            background: var(--primary-blue);
            right: 0;
            top: 0;
            animation: infinity-loader-right 2s infinite;
        }

        @keyframes infinity-loader {
            0%, 65% {background-position: left -40px top 0, right -40px top 0}
            85% {background-position: left 0 top 0, right 0 top 0}
            100% {background-position: left 0 top 0, right 0 top 0}
        }

        @keyframes infinity-loader-left {
            0%, 60%, 100% {left: 0}
            80% {left: calc(100% - 40px)}
        }

        @keyframes infinity-loader-right {
            0%, 60%, 100% {right: 0}
            80% {right: calc(100% - 40px)}
        }

        /* Opsi 5: Modern Spinner with Logo */
        .logo-spinner {
            position: relative;
            width: 80px;
            height: 80px;
        }

        .logo-spinner img {
            position: absolute;
            width: 60px;
            height: 60px;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        .logo-spinner::before {
            content: "";
            position: absolute;
            width: 80px;
            height: 80px;
            border: 5px solid rgba(52, 152, 219, 0.2);
            border-radius: 50%;
            box-sizing: border-box;
        }

        .logo-spinner::after {
            content: "";
            position: absolute;
            width: 80px;
            height: 80px;
            border: 5px solid transparent;
            border-top-color: var(--primary-blue);
            border-radius: 50%;
            box-sizing: border-box;
            animation: logo-spinner 1s linear infinite;
        }

        @keyframes logo-spinner {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Rest of your existing styles... */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDrop {
            0% {
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 25px rgba(52, 152, 219, 0.15);
            background-color: #ffffff;
            border-top: 4px solid var(--primary-blue);
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: fadeInDrop 0.8s ease-out forwards;
            animation-delay: 0.1s;
        }

        .login-title {
            font-weight: 600;
            margin-bottom: 1.8rem;
            color: var(--text-dark);
            font-size: 1.8rem;
            position: relative;
            text-align: center;
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
</head>
<body>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <!-- Pilih salah satu animasi loading yang Anda suka -->
        
        <!-- Opsi 1: Dot Pulse -->
        <div class="dot-pulse"></div>
        
        <!-- Opsi 2: Spinner -->
        <!-- <div class="spinner"></div> -->
        
        <!-- Opsi 3: Bouncing Dots -->
        <!-- <div class="bouncing-dots">
            <div></div>
            <div></div>
            <div></div>
        </div> -->
        
        <!-- Opsi 4: Infinity Loader -->
        <!-- <div class="infinity-loader"></div> -->
        
        <!-- Opsi 5: Modern Spinner with Logo -->
        <!-- <div class="logo-spinner">
            <img src="assets/sitoko.jpg" alt="Loading...">
        </div> -->
    </div>

    <div class="login-card">
        <!-- Logo Section -->
        <div class="logo-container">
            <img src="assets/sitoko.jpg" alt="SiToko Logo" class="logo-img">
        </div>

        <h3 class="login-title">Login</h3>

        {{-- Tampilkan pesan error jika login gagal --}}
        @if ($errors->has('login'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('login') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" id="loginForm">
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
    
    <script>
        // Aktifkan loading overlay saat form disubmit
        document.getElementById('loginForm').addEventListener('submit', function() {
            document.getElementById('loadingOverlay').classList.add('active');
        });

        // Untuk demo, kita akan menyembunyikan loading setelah 3 detik
        // Di implementasi nyata, ini akan dihandle oleh callback AJAX atau redirect halaman
        setTimeout(function() {
            document.getElementById('loadingOverlay').classList.remove('active');
        }, 3000);
    </script>
</body>
</html>