<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna - SiToko</title>
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
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            font-weight: 600;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
        }

        .card-header i {
            margin-right: 10px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .text-muted {
            color: var(--text-light);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: bold;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .user-details {
            flex: 1;
        }

        .user-status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            background-color: #e3f7e8;
            color: #28a745;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-edit {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .btn-edit:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-delete {
            background-color: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
        }

        .btn-delete:hover {
            background-color: #ff6b6b;
            color: white;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .btn-add {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s ease;
        }

        .btn-add:hover {
            background-color: var(--primary-dark);
            color: white;
        }

        .search-box {
            position: relative;
            margin-bottom: 25px;
            max-width: 300px;
        }

        .search-box input {
            padding-left: 40px;
            border-radius: 6px;
            border: 1px solid rgba(0,0,0,0.1);
            height: 40px;
            width: 100%;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .no-results {
            text-align: center;
            padding: 2rem;
            color: var(--text-light);
            font-style: italic;
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
        <a href="{{ route('pengguna') }}" class="{{ request()->routeIs('pengguna') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Pengguna
        </a>
        <a href="{{ route('pendataan') }}" class="{{ request()->routeIs('pendataan') ? 'active' : '' }}">
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
            <div class="page-header">
        <h2 style="color: var(--primary); font-weight: 700;">
            <i class="fas fa-users"></i> Data Pengguna
        </h2>
                <a href="{{ route('register_user') }}" class="btn-add">
            <i class="fas fa-user-plus"></i> Tambah Pengguna
        </a>

    </div>
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Cari pengguna..." onkeyup="searchUsers()">
        </div>

        <div class="row" id="usersContainer">
            @foreach ($users as $user)

                <div class="col-md-4 mb-4 user-card">
                    <div class="card">
                        <div class="card-header">
                            <div class="user-avatar">
                                {{ substr($user['name'], 0, 1) }}
                            </div>
                            <div>
                                <div class="user-name">{{ $user['name'] }}</div>
                                <small class="text-muted user-role">{{ $user['role'] }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-details">
                                <p><i class="fas fa-envelope text-muted mr-2"></i> <span class="user-email">{{ $user['email'] }}</span></p>
                                <p><i class="fas fa-user-tag text-muted mr-2"></i> <span class="user-status">Aktif</span></p>
                            </div>
                           <div class="action-buttons">
                            <a href="{{ route('pengguna.edit', $user->id) }}" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            
                            <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="noResults" class="no-results" style="display: none;">
            <i class="fas fa-user-slash" style="font-size: 2rem; margin-bottom: 1rem;"></i>
            <h4>Pengguna tidak ditemukan</h4>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function searchUsers() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toUpperCase();
            const usersContainer = document.getElementById('usersContainer');
            const userCards = document.getElementsByClassName('user-card');
            const noResults = document.getElementById('noResults');
            
            let foundResults = false;

            for (let i = 0; i < userCards.length; i++) {
                const card = userCards[i];
                const name = card.querySelector('.user-name').textContent.toUpperCase();
                const email = card.querySelector('.user-email').textContent.toUpperCase();
                const role = card.querySelector('.user-role').textContent.toUpperCase();
                
                if (name.includes(filter) || email.includes(filter) || role.includes(filter)) {
                    card.style.display = "";
                    foundResults = true;
                } else {
                    card.style.display = "none";
                }
            }

            if (foundResults) {
                noResults.style.display = "none";
            } else {
                noResults.style.display = "block";
            }
        }
    </script>
</body>
</html>