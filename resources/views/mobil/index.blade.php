<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mobil - SiToko</title>
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

        .car-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(0,0,0,0.1);
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

        .price-format {
            font-weight: 600;
            color: var(--primary);
        }
    </style>
</head>
<body>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="page-title">
            <i class="fas fa-car"></i>
            <h2>Data Mobil</h2>
        </div>
        <a href="{{ route('mobil.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Mobil
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
                    <input type="text" class="form-control border-start-0" placeholder="Cari mobil..." id="searchInput">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterMerek">
                    <option value="">Semua Merek</option>
                    @foreach($mereks as $merek)
                        <option value="{{ $merek->id }}">{{ $merek->nama_merek }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-list"></i> Daftar Mobil
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Foto</th>
                            <th>Nama Mobil</th>
                            <th>Merek</th>
                            <th>Tahun</th>
                            <th>Warna</th>
                            <th>Harga</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="mobilTableBody">
                        @forelse ($mobils as $index => $mobil)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($mobil->foto)
                                    <img src="{{ asset('storage/' . $mobil->foto) }}" class="car-image" alt="{{ $mobil->model }}">
                                @else
                                    <div class="car-image bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-car text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $mobil->merek->nama_merek ?? '-' }}</td>
                            <td>{{ $mobil->model }}</td>
                            <td>{{ $mobil->tahun }}</td>
                            <td>{{ $mobil->warna }}</td>
                            <td class="price-format">Rp {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus mobil ini?');">
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
                            <td colspan="8" class="no-data">
                                <i class="fas fa-info-circle" style="font-size: 1.5rem; margin-bottom: 10px;"></i><br>
                                Tidak ada data mobil
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
        const tableRows = document.querySelectorAll('#mobilTableBody tr:not(#noDataRow)');
        let visibleCount = 0;

        tableRows.forEach(row => {
            const merek = row.cells[2]?.textContent.toLowerCase();
            const model = row.cells[3]?.textContent.toLowerCase();
            const tahun = row.cells[4]?.textContent.toLowerCase();
            const warna = row.cells[5]?.textContent.toLowerCase();
            const harga = row.cells[6]?.textContent.toLowerCase();
            
            if (merek.includes(searchTerm) || 
                model.includes(searchTerm) || 
                tahun.includes(searchTerm) || 
                warna.includes(searchTerm) ||
                harga.includes(searchTerm)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Tampilkan pesan jika tidak ada baris yang cocok
        const noDataRow = document.getElementById('noDataRow');
        if (noDataRow) {
            noDataRow.style.display = visibleCount === 0 ? '' : 'none';
            
            if (visibleCount === 0 && searchTerm !== '') {
                noDataRow.querySelector('td').innerHTML = `
                    <i class="fas fa-info-circle" style="font-size: 1.5rem; margin-bottom: 10px;"></i><br>
                    Tidak ditemukan mobil yang sesuai dengan pencarian
                `;
            } else if (visibleCount === 0) {
                noDataRow.querySelector('td').innerHTML = `
                    <i class="fas fa-info-circle" style="font-size: 1.5rem; margin-bottom: 10px;"></i><br>
                    Tidak ada data mobil
                `;
            }
        }
    });

    // Filter by brand
    document.getElementById('filterMerek').addEventListener('change', function() {
        const filterValue = this.value;
        const tableRows = document.querySelectorAll('#mobilTableBody tr:not(#noDataRow)');
        
        tableRows.forEach(row => {
            const merekId = row.cells[2].textContent.toLowerCase();
            
            if (filterValue === '' || 
                (this.options[this.selectedIndex].text.toLowerCase() === merekId)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        updateNoDataRow();
    });

    // Filter by status (jika ada kolom status)
    document.getElementById('filterStatus').addEventListener('change', function() {
        const filterValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#mobilTableBody tr:not(#noDataRow)');
        
        tableRows.forEach(row => {
            const status = row.cells[7]?.textContent.toLowerCase() || '';
            
            if (filterValue === '' || status.includes(filterValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        updateNoDataRow();
    });

    function updateNoDataRow() {
        const visibleRows = document.querySelectorAll('#mobilTableBody tr:not(#noDataRow)[style=""]');
        const noDataRow = document.getElementById('noDataRow');
        
        if (noDataRow) {
            noDataRow.style.display = visibleRows.length === 0 ? '' : 'none';
            
            if (visibleRows.length === 0) {
                const merekFilter = document.getElementById('filterMerek').value;
                const statusFilter = document.getElementById('filterStatus').value;
                
                let message = 'Tidak ada data mobil';
                
                if (merekFilter || statusFilter) {
                    message = 'Tidak ditemukan mobil dengan filter yang dipilih';
                }
                
                noDataRow.querySelector('td').innerHTML = `
                    <i class="fas fa-info-circle" style="font-size: 1.5rem; margin-bottom: 10px;"></i><br>
                    ${message}
                `;
            }
        }
    }
</script>
</body>
</html>