<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            background-color: white;
        }

        .form-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .form-header i {
            margin-right: 12px;
            font-size: 1.5rem;
            color: #5E74FF;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #5E74FF;
            box-shadow: 0 0 0 0.25rem rgba(94, 116, 255, 0.25);
        }

        .btn-action {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-action i {
            margin-right: 8px;
        }

        body {
            background-color: #f8fafc;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <i class="fas fa-car"></i>
                <h3 class="m-0">Tambah Mobil</h3>
            </div>
                <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="merek_id" class="form-label">Merek Mobil</label>
                        <select name="merek_id" id="merek_id" class="form-control" required>
                            <option value="">-- Pilih Merek --</option>
                            @foreach($mereks as $merek)
                                <option value="{{ $merek->id }}">{{ $merek->nama_merek }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" name="nama mobil" id="model" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" name="tahun" id="tahun" required>
                    </div>

                    <div class="mb-3">
                        <label for="warna" class="form-label">Warna</label>
                        <input type="text" class="form-control" name="warna" id="warna" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Mobil</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <a href="{{ route('mobil.index') }}" class="btn btn-secondary btn-action">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
