@php
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .sidebar {
            background: linear-gradient(180deg, #4e54c8, #8f94fb);
            min-height: 100vh;
            color: white;
            padding-top: 1.5rem;
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link {
            color: white;
            font-weight: 500;
            margin-bottom: 8px;
            border-radius: 10px;
            padding: 10px 15px;
            transition: background 0.2s ease;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .sidebar .nav-link.active {
            background-color: #ffffff;
            color: #4e54c8;
        }

        .main-content {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                width: 250px;
                z-index: 1050;
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark sticky-top p-3 shadow-sm">
        <button class="btn btn-outline-light d-md-none me-2" id="toggleSidebar">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand px-3" href="#">✨ MyInventory</a>

        <div class="ms-auto pe-3">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i> {{ $user->name ?? 'User' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <ul class="nav flex-column px-3">
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('dashboard')) active @endif"
                            href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('products*')) active @endif"
                            href="{{ route('products.index') }}">
                            <i class="bi bi-box-seam me-2"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('stock-in*')) active @endif"
                            href="{{ route('stock-in.index') }}">
                            <i class="bi bi-arrow-down-square me-2"></i> Stock In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('stock-out*')) active @endif"
                            href="{{ route('stock-out.index') }}">
                            <i class="bi bi-arrow-up-square me-2"></i> Stock Out
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('reports/stock-in')) active @endif"
                            href="{{ route('reports.stock-in') }}">
                            <i class="bi bi-graph-up me-2"></i> Reports In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('reports/stock-out')) active @endif"
                            href="{{ route('reports.stock-out') }}">
                            <i class="bi bi-graph-up-arrow me-2"></i> Reports Out
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('categories*')) active @endif"
                            href="{{ route('categories.index') }}">
                            <i class="bi bi-tags me-2"></i> Categories
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
                <div class="main-content">
                    <h4 class="mb-4">@yield('page-title', 'Dashboard')</h4>
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggleSidebar')?.addEventListener('click', function() {
            document.getElementById('sidebar')?.classList.toggle('show');
        });
    </script>
    @yield('scripts')
</body>

</html>
