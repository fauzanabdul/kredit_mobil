<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Merek Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 700px;
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

        .btn-primary {
            background-color: #5E74FF;
            border-color: #5E74FF;
        }

        .btn-primary:hover {
            background-color: #4a5ecc;
            border-color: #4a5ecc;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .text-danger {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <i class="fas fa-edit"></i>
                <h3 class="m-0">Edit Merek Mobil</h3>
            </div>
            
            <form method="POST" action="{{ route('merek.update', $merek->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="nama_merek" class="form-label">Nama Merek</label>
                    <input type="text" 
                           class="form-control @error('nama_merek') is-invalid @enderror" 
                           id="nama_merek" 
                           name="nama_merek" 
                           required
                           value="{{ old('nama_merek', $merek->nama_merek) }}">
                    @error('nama_merek')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('merek.index') }}" class="btn btn-secondary btn-action">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-action">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>