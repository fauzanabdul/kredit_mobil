<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan - SiToko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --transition: all 0.3s ease;
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
            z-index: 100;
        }

        .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            background-color: var(--primary);
        }

        .sidebar-header h4 {
            color: white;
            margin: 0;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .sidebar a {
            color: var(--text-medium);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-left: 3px solid transparent;
            font-weight: 500;
            transition: var(--transition);
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: var(--primary-light);
            color: var(--primary);
            border-left: 3px solid var(--primary);
        }

        .content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 2.5rem;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 20px;
            border-top: 3px solid var(--primary);
            background-color: white;
            transition: var(--transition);
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background-color: white;
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
        }

        .card-header i {
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-body p {
            color: var(--text-medium);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .logout-btn {
            position: absolute;
            bottom: 0;
            width: 100%;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding: 15px 20px;
            color: var(--text-medium);
        }

        .logout-btn:hover {
            background-color: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .page-title {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title i {
            margin-right: 15px;
            color: var(--primary);
            font-size: 1.8rem;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
            padding: 8px 18px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .dashboard-card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
    </style>
</head>
<body>

<div class="sidebar d-flex flex-column">
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

    <div class="mt-auto"></div>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<div class="content">
    <div class="page-title">
        <i class="fas fa-chart-bar"></i>
        <h2 class="m-0">Laporan</h2>
    </div>

    <div class="dashboard-card-grid">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-credit-card"></i> Laporan Kredit
            </div>
            <div class="card-body">
                <p>Menampilkan total transaksi kredit pelanggan dalam periode tertentu, termasuk data mobil dan merek.</p>
                <a href="{{ route('laporan.kredit') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Lihat Laporan
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-car"></i> Laporan Data Mobil
            </div>
            <div class="card-body">
                <p>Menampilkan daftar mobil yang tersedia dan yang sudah terjual, lengkap dengan detail merek, tahun, dan harga.</p>
                <a href="{{ route('laporan.mobil') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Lihat Laporan
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
