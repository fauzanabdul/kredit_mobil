<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kredit Mobil - SiToko</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            color: var(--text-dark);
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

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
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
    </style>
</head>
<body>

    <div class="mb-4">
        <h2><i class="fas fa-file-alt"></i> Laporan Kredit Mobil</h2>
        <a href="{{ route('laporan') }}" class="btn btn-secondary mt-2">
            <i class="fas fa-arrow-left"></i> Kembali ke Laporan
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-credit-card" style="color: var(--primary);"></i> Data Kredit Terdaftar
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
                            <th>Promo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kredits as $index => $kredit)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kredit->nama_mobil }}</td>
                            <td>{{ $kredit->tenor }} bulan</td>
                            <td>{{ $kredit->bunga }}%</td>
                            <td>{{ $kredit->metode_pembayaran }}</td>
                            <td>{{ $kredit->dp_minimum }}%</td>
                            <td>{{ $kredit->promo ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data kredit</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
