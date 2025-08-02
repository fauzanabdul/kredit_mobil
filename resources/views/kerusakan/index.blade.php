<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendataan Kerusakan - SiToko</title>
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

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-tools"></i> Pendataan Kerusakan</h2>
        <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#tambahKerusakanModal">
                <i class="fas fa-plus"></i> Tambah Data Kerusakan
            </button>
        </div>
    </div>

    <a href="{{ route('pendataan') }}" class="btn btn-secondary mb-4">
        <i class="fas fa-arrow-left"></i> Kembali ke Pendataan
    </a>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-exclamation-triangle" style="color: var(--primary);"></i> Daftar Kerusakan Barang
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                   <thead>
    <tr>
        <th>No</th>
        <th>Foto</th> <!-- Tambahan -->
        <th>Nama Barang</th>
        <th>Kerusakan</th>
        <th>Tanggal</th>
        <th>Pelapor</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>

                    <tbody>
                        <!-- Contoh Data Dummy -->
                        <!-- <tr>
                            <td>1</td>
                            <td>Laptop Acer</td>
                            <td>Layar retak</td>
                            <td>2025-07-31</td>
                            <td>Joan Imanuel</td>
                            <td><span class="badge bg-warning text-dark">Sedang diperiksa</span></td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data Kerusakan -->
    <div class="modal fade" id="tambahKerusakanModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> Tambah Data Kerusakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama barang">
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Foto Barang</label>
                                <input type="file" class="form-control" name="foto_barang">
                            </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Kerusakan</label>
                            <textarea class="form-control" rows="3" placeholder="Contoh: Keyboard tidak berfungsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Kerusakan</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama pemilik">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option value="diperiksa">Sedang diperiksa</option>
                                <option value="diperbaiki">Sedang diperbaiki</option>
                                <option value="selesai">Selesai</option>
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

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
