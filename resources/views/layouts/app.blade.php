<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tokopakedi - Toko Online Terpercaya')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar-brand {
            font-weight: 600;
        }
        main {
            flex: 1;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-shop me-2"></i>Tokopakedi
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{{ url('/categories') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">Tentang Kami</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{ url('/products') }}" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari produk..." aria-label="Search" value="{{ request('search') }}">
                    <button class="btn btn-outline-light" type="submit">Cari</button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart') }}">
                            <i class="bi bi-cart3 me-1"></i>Keranjang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">
                            <i class="bi bi-person-circle me-1"></i>Masuk
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Tokopakedi</h5>
                    <p class="text-muted">Toko online terpercaya dengan berbagai produk berkualitas.</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/about') }}" class="text-decoration-none text-muted">Tentang Kami</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-decoration-none text-muted">Hubungi Kami</a></li>
                        <li><a href="{{ url('/faq') }}" class="text-decoration-none text-muted">FAQ</a></li>
                        <li><a href="{{ url('/privacy') }}" class="text-decoration-none text-muted">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Ikuti Kami</h5>
                    <div class="d-flex">
                        <a href="#" class="me-3 text-muted"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="me-3 text-muted"><i class="bi bi-twitter fs-4"></i></a>
                        <a href="#" class="me-3 text-muted"><i class="bi bi-instagram fs-4"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-youtube fs-4"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Tokopakedi. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>