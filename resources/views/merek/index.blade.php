<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Merek Mobil - SiToko</title>
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
            display: flex;
            align-items: center;
        }

        .card-header i {
            margin-right: 10px;
            font-size: 1.1rem;
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
            padding: 8px 16px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .table {
            margin-bottom: 0;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            background-color: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            border: none;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: rgba(0,0,0,0.05);
        }

        .table tr:not(:last-child) td {
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .table tr:hover td {
            background-color: rgba(94, 116, 255, 0.03);
        }

        .badge {
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 50px;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 6px;
        }

        .btn-warning {
            background-color: #FFC107;
            border-color: #FFC107;
        }

        .btn-danger {
            background-color: #DC3545;
            border-color: #DC3545;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 8px;
            background-color: #f8f9fa;
            padding: 5px;
        }

        .search-box {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .search-box .form-control {
            border-radius: 8px;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 10px 15px;
        }

        .search-box .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(94, 116, 255, 0.25);
        }

        .page-title {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .page-title i {
            color: var(--primary);
            margin-right: 15px;
            font-size: 1.8rem;
        }

        .page-title h2 {
            margin: 0;
            font-weight: 600;
            color: var(--text-dark);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .no-data {
            padding: 30px;
            text-align: center;
            color: var(--text-light);
            font-style: italic;
        }

        .back-btn {
            margin-bottom: 20px;
            border-radius: 8px;
            padding: 8px 16px;
        }
    </style>
</head>
<body>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="page-title">
            <i class="fas fa-tags"></i>
            <h2>Data Merek Mobil</h2>
        </div>
        <a href="{{ route('merek.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Merek
        </a>
    </div>
    
    <a href="{{ route('pendataan') }}" class="btn btn-secondary back-btn">
        <i class="fas fa-arrow-left"></i> Kembali ke Pendataan
    </a>

    <div class="search-box">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0" placeholder="Cari merek mobil..." id="searchInput">
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-list"></i> Daftar Merek Mobil
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama Merek</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="merekTableBody">
                        @forelse ($mereks as $index => $merek)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $merek->nama }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('merek.edit', $merek->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('merek.destroy', $merek->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus merek ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr id="noDataRow">
                            <td colspan="3" class="no-data">
                                <i class="fas fa-info-circle" style="font-size: 1.5rem; margin-bottom: 10px;"></i><br>
                                Tidak ada data merek mobil
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#merekTableBody tr:not(#noDataRow)');
        let visibleCount = 0;

        tableRows.forEach(row => {
            const merekName = row.cells[1]?.textContent.toLowerCase();
            if (merekName.includes(searchTerm)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Tampilkan pesan jika tidak ada baris yang cocok
        const noDataRow = document.getElementById('noDataRow');
        if (noDataRow) {
            noDataRow.style.display = visibleCount === 0 && searchTerm !== '' ? '' : 'none';
            
            if (visibleCount === 0 && searchTerm !== '') {
                noDataRow.querySelector('td').textContent = 'Tidak ditemukan merek yang sesuai';
            } else if (visibleCount === 0) {
                noDataRow.querySelector('td').innerHTML = `
                    <i class="fas fa-info-circle" style="font-size: 1.5rem; margin-bottom: 10px;"></i><br>
                    Tidak ada data merek mobil
                `;
            }
        }
    });
</script>
</body>
</html>