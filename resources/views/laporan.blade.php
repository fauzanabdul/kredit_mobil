<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan - SiToko</title>
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
        }

        .sidebar a {
            color: var(--text-medium);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-left: 3px solid transparent;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .sidebar a.active {
            background-color: var(--primary-light);
            color: var(--primary);
            border-left: 3px solid var(--primary);
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
            margin-bottom: 20px;
            border-top: 3px solid var(--primary);
            background-color: white;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        table thead {
            background-color: var(--primary);
            color: white;
        }

        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-header">
            <h4><i class="fas fa-store"></i> SiToko</h4>
        </div>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('pengguna') }}" class="{{ request()->routeIs('pendataan') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Pengguna
        </a>
        <a href="{{ route('pendataan') }}" class="{{ request()->routeIs('pengguna') ? 'active' : '' }}">
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

    <!-- Main Content -->
    <div class="content">
        <h2 class="mb-4" style="color: var(--primary); font-weight: 700;">
            <i class="fas fa-chart-bar"></i> Laporan
        </h2>

        <div class="card">
            <div class="card-header">Laporan Transaksi Kredit</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Mobil</th>
                            <th>Merek</th>
                            <th>Total Kredit</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh data dummy --}}
                        <tr>
                            <td>1</td>
                            <td>Budi Hartono</td>
                            <td>Avanza</td>
                            <td>Toyota</td>
                            <td>Rp 150.000.000</td>
                            <td>2025-07-27</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Nurhaliza</td>
                            <td>Brio</td>
                            <td>Honda</td>
                            <td>Rp 130.000.000</td>
                            <td>2025-07-26</td>
                        </tr>
                        {{-- Akhir contoh --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
