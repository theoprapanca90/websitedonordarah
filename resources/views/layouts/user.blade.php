<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'User') - Donor Darah</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #dc3545;
            --secondary: #6c757d;
            --light: #f8f9fa;
            --dark: #343a40;
        }
        
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            height: 100vh;
            background-color: var(--dark);
            color: white;
            position: fixed;
            padding-top: 20px;
            width: 250px;
            overflow-y: auto;
        }
        
        .sidebar a {
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            transition: 0.3s;
        }
        
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar a.active {
            background-color: var(--primary);
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .card-dashboard {
            border-radius: 10px;
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .card-dashboard:hover {
            transform: translateY(-5px);
        }
        
        .blood-type {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
        }
        
        .blood-type-card {
            border-left: 4px solid var(--primary);
        }
        
        .navbar-custom {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .blood-badge {
            background-color: var(--primary);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        
        .btn-blood {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-blood:hover {
            background-color: #bb2d3b;
            color: white;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4"><i class="fas fa-tint me-2"></i>Donor Darah</h4>
        
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>
        <a href="{{ route('user.jadwal-donor') }}" class="{{ request()->routeIs('user.jadwal-donor') ? 'active' : '' }}">
            <i class="fas fa-calendar me-2"></i> Jadwal Donor
        </a>
        <a href="{{ route('user.stok-darah') }}" class="{{ request()->routeIs('user.stok-darah') ? 'active' : '' }}">
            <i class="fas fa-tint me-2"></i> Stok Darah
        </a>
        <a href="{{ route('user.riwayat-donor') }}" class="{{ request()->routeIs('user.riwayat-donor') ? 'active' : '' }}">
            <i class="fas fa-history me-2"></i> Riwayat Donor
        </a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">@yield('page-title', 'Dashboard')</span>
                <div class="d-flex">
                    <span class="navbar-text me-3">
                        <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                    </span>
                    <span class="blood-badge">{{ Auth::user()->golongan_darah }}</span>
                </div>
            </div>
        </nav>

        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Content -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
