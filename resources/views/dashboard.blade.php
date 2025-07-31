<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard SiToko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #5E74FF;
            --primary-light: rgba(94, 116, 255, 0.1);
            --primary-dark: #4a5ecc;
            --text-dark: #2c3e50;
            --text-medium: #5c6c7d;
            --text-light: #95a5a6;
            --sidebar-width: 250px;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        body {
            min-height: 100vh;
            display: flex;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            color: var(--text-dark);
        }

        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            position: fixed;
            height: 100vh;
            box-shadow: 2px 0 15px rgba(0,0,0,0.05);
            border-right: 1px solid rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 1.5rem;
            background-color: var(--primary);
            text-align: center;
            color: white;
            font-weight: 600;
        }

        .sidebar a {
            color: var(--text-medium);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: var(--primary-light);
            color: var(--primary);
            border-left: 3px solid var(--primary);
            font-weight: 600;
        }

        .logout-btn {
            margin-top: auto;
            border-top: 1px solid rgba(0,0,0,0.05);
            color: var(--text-medium);
            padding: 15px 20px;
        }

        .logout-btn:hover {
            color: #ff6b6b !important;
            background-color: rgba(255, 107, 107, 0.1);
        }

        .content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: 0.3s;
            border-top: 3px solid var(--primary);
            background-color: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(94, 116, 255, 0.15);
        }

        .card-header {
            background-color: white;
            font-weight: 600;
            color: var(--text-dark);
            border-radius: 12px 12px 0 0 !important;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .card-body h3 {
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .welcome-section {
            background-color: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary);
        }

        .welcome-section h2 {
            color: var(--primary);
            font-weight: 700;
        }

        .text-muted {
            color: var(--text-light) !important;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <h4><i class="fas fa-store"></i> SiToko</h4>
    </div>

    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>
    <a href="{{ route('pengguna') }}" class="{{ request()->routeIs('pengguna') ? 'active' : '' }}">
        <i class="fas fa-users"></i> Pengguna
    </a>
    <a href="{{ route('pendataan') }}" class="{{ request()->routeIs('pendataan') ? 'active' : '' }}">
        <i class="fas fa-boxes"></i> Pendataan
    </a>
    <a href="{{ route('laporan') }}" class="{{ request()->routeIs('laporan') ? 'active' : '' }}">
        <i class="fas fa-chart-bar"></i> Laporan
    </a>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
</div>

<!-- Main Content -->
<div class="content">
    <div class="welcome-section">
        <h2><i class="fas fa-handshake"></i> Selamat datang, {{ Auth::user()->name }}!</h2>
        <p class="text-muted">Silakan pilih menu dari sidebar untuk melanjutkan.</p>
    </div>

    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-shopping-cart" style="color: var(--primary);"></i> Total Mobil
                    </div>
                    <div class="card-body">
                        <h3>1,254</h3>
                        <p class="text-muted">+12% dari bulan lalu</p>
                    </div>
                </div>
            </div>

           <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-users" style="color: var(--primary);"></i> Total Pengguna
        </div>
        <div class="card-body">
            <h3>{{ isset($jumlahPengguna) ? number_format($jumlahPengguna) : '0' }}</h3>
            <p class="text-muted">+8% dari bulan lalu</p>
        </div>
    </div>
</div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-chart-line" style="color: var(--primary);"></i> Total Merek
                    </div>
                    <div class="card-body">
                        <h3>Rp 28,5jt</h3>
                        <p class="text-muted">+15% dari bulan lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
