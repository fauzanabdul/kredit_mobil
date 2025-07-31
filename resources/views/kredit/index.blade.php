<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kredit Mobil - SiToko</title>
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
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
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
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
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

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            border: none;
            padding: 15px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: rgba(0,0,0,0.05);
        }

        .badge {
            font-size: 0.75rem;
            padding: 6px 12px;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>



<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-credit-card"></i> Data Kredit Mobil</h2>
        <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#tambahKreditModal">
                <i class="fas fa-plus"></i> Tambah Kredit Mobil
            </button>
        </div>
    </div>

    <!-- Tambahkan tombol di sini -->
    <a href="{{ route('pendataan') }}" class="btn btn-secondary mb-4">
        <i class="fas fa-arrow-left"></i> Kembali ke Pendataan
    </a>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-credit-card" style="color: var(--primary);"></i> Paket Kredit Mobil
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Tenor</th>
                            <th>Bunga</th>
                            <th>Pembayaran</th>
                            <th>DP Minimum</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Modal Tambah Paket Kredit -->
<div class="modal fade" id="tambahKreditModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Tambah Paket Kredit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama paket">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tenor (bulan)</label>
                                <select class="form-select">
                                    <option value="12">12 bulan</option>
                                    <option value="24">24 bulan</option>
                                    <option value="36">36 bulan</option>
                                    <option value="48">48 bulan</option>
                                    <option value="60">60 bulan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bunga (%)</label>
                                <input type="number" class="form-control" step="0.1" placeholder="0.0">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DP Minimum (%)</label>
                        <input type="number" class="form-control" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran</label>
                        <select class="form-select">
                            <option value="aktif">Gopay</option>
                            <option value="nonaktif">Dana</option>
                            <option value="nonaktif">Indomaret</option>
                            <option value="nonaktif">Alfamart</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>