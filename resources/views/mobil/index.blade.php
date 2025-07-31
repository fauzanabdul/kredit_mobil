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

        .car-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #e9ecef;
        }

        .search-box {
            background-color: white;
            border-radius: 8px;
            box-shadow: var(--card-shadow);
            padding: 20px;
            margin-bottom: 20px;
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
        <h2><i class="fas fa-car"></i> Data Mobil</h2>
        <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#tambahMobilModal">
                <i class="fas fa-plus"></i> Tambah Mobil
            </button>
            <a href="{{ route('pendataan') }}" class="btn btn-secondary mt-3">
    <i class="fas fa-arrow-left"></i> Kembali ke Pendataan
</a>
        </div>
    </div>

    <div class="search-box">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Cari mobil..." id="searchInput">
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterMerek">
                    <option value="">Semua Merek</option>
                    <option value="toyota">Toyota</option>
                    <option value="honda">Honda</option>
                    <option value="mitsubishi">Mitsubishi</option>
                    <option value="nissan">Nissan</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="terjual">Terjual</option>
                    <option value="booking">Booking</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-car" style="color: var(--primary);"></i> Daftar Unit Mobil
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Merek/Model</th>
                            <th>Tahun</th>
                            <th>Warna</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="https://via.placeholder.com/80x60/007bff/ffffff?text=Car" alt="Avanza" class="car-image"></td>
                            <td>
                                <strong>Toyota Avanza</strong><br>
                                <small class="text-muted">1.3 G MT</small>
                            </td>
                            <td>2023</td>
                            <td>Putih</td>
                            <td class="price-format">Rp 235.000.000</td>
                            <td><span class="badge bg-success">Tersedia</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="https://via.placeholder.com/80x60/dc3545/ffffff?text=Car" alt="Brio" class="car-image"></td>
                            <td>
                                <strong>Honda Brio</strong><br>
                                <small class="text-muted">1.2 S CVT</small>
                            </td>
                            <td>2022</td>
                            <td>Merah</td>
                            <td class="price-format">Rp 185.000.000</td>
                            <td><span class="badge bg-warning">Booking</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="https://via.placeholder.com/80x60/28a745/ffffff?text=Car" alt="Xpander" class="car-image"></td>
                            <td>
                                <strong>Mitsubishi Xpander</strong><br>
                                <small class="text-muted">1.5 Ultimate AT</small>
                            </td>
                            <td>2023</td>
                            <td>Silver</td>
                            <td class="price-format">Rp 285.000.000</td>
                            <td><span class="badge bg-success">Tersedia</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><img src="https://via.placeholder.com/80x60/ffc107/000000?text=Car" alt="Livina" class="car-image"></td>
                            <td>
                                <strong>Nissan Livina</strong><br>
                                <small class="text-muted">1.5 VL CVT</small>
                            </td>
                            <td>2022</td>
                            <td>Hitam</td>
                            <td class="price-format">Rp 225.000.000</td>
                            <td><span class="badge bg-danger">Terjual</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><img src="https://via.placeholder.com/80x60/6f42c1/ffffff?text=Car" alt="Rush" class="car-image"></td>
                            <td>
                                <strong>Toyota Rush</strong><br>
                                <small class="text-muted">1.5 TRD AT</small>
                            </td>
                            <td>2023</td>
                            <td>Abu-abu</td>
                            <td class="price-format">Rp 275.000.000</td>
                            <td><span class="badge bg-success">Tersedia</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><img src="https://via.placeholder.com/80x60/17a2b8/ffffff?text=Car" alt="Jazz" class="car-image"></td>
                            <td>
                                <strong>Honda Jazz</strong><br>
                                <small class="text-muted">1.5 RS CVT</small>
                            </td>
                            <td>2022</td>
                            <td>Biru</td>
                            <td class="price-format">Rp 295.000.000</td>
                            <td><span class="badge bg-success">Tersedia</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info me-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-car fa-2x text-success mb-2"></i>
                    <h6>Total Unit</h6>
                    <h4 class="text-success">6</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-dollar-sign fa-2x text-info mb-2"></i>
                    <h6>Terjual</h6>
                    <h4 class="text-info">1</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Mobil -->
<div class="modal fade" id="tambahMobilModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Tambah Unit Mobil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Merek</label>
                                <select class="form-select">
                                    <option value="">Pilih Merek</option>
                                    <option value="toyota">Toyota</option>
                                    <option value="honda">Honda</option>
                                    <option value="mitsubishi">Mitsubishi</option>
                                    <option value="nissan">Nissan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Model</label>
                                <input type="text" class="form-control" placeholder="Masukkan model mobil">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tahun</label>
                                <select class="form-select">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <input type="text" class="form-control" placeholder="Warna mobil">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="tersedia">Tersedia</option>
                                    <option value="booking">Booking</option>
                                    <option value="terjual">Terjual</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" placeholder="Masukkan harga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Mobil</label>
                        <input type="file" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi tambahan"></textarea>
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
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            const carName = row.cells[2].textContent.toLowerCase();
            const color = row.cells[4].textContent.toLowerCase();
            
            if (carName.includes(searchTerm) || color.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Filter by brand
    document.getElementById('filterMerek').addEventListener('change', function() {
        const filterValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            const carName = row.cells[2].textContent.toLowerCase();
            
            if (filterValue === '' || carName.includes(filterValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Filter by status
    document.getElementById('filterStatus').addEventListener('change', function() {
        const filterValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            const statusBadge = row.cells[6].querySelector('.badge');
            const status = statusBadge.textContent.toLowerCase();
            
            if (filterValue === '' || status.includes(filterValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>