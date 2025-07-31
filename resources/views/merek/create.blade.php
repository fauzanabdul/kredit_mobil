<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Merek Mobil</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <i class="fas fa-tags"></i>
                <h3 class="m-0">Tambah Merek Mobil</h3>
            </div>
            
            <form action="{{ route('merek.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Merek <span class="text-danger">*</span></label>
                    <input type="text" name="nama id="nama" class="form-control" 
                           placeholder="Masukan Nama Merek" required>
                </div>

               

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('merek.index') }}" class="btn btn-secondary btn-action">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-action">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>