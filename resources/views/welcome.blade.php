@extends('layouts.app')

@section('title', 'Beranda - Tokopakedi')

@section('content')
<div class="container">
    <div class="jumbotron bg-primary text-white text-center py-5 mb-4">
        <h1 class="display-4">Selamat Datang di Tokopakedi</h1>
        <p class="lead">Temukan berbagai produk berkualitas dengan harga terbaik!</p>
        <a href="{{ url('/products') }}" class="btn btn-light btn-lg">Jelajahi Produk</a>
    </div>

    <h2 class="mb-4">Produk Unggulan</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
        @for ($i = 1; $i <= 4; $i++)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produk {{ $i }}">
                    <div class="card-body">
                        <h5 class="card-title">Produk Unggulan {{ $i }}</h5>
                        <p class="card-text">Deskripsi singkat produk unggulan {{ $i }}.</p>
                        <p class="card-text fw-bold">Rp {{ number_format(rand(100000, 1000000), 0, ',', '.') }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="#" class="btn btn-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <h2 class="mb-4">Kategori Populer</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach(['Elektronik', 'Fashion', 'Kesehatan & Kecantikan'] as $category)
            <div class="col">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $category }}</h3>
                        <a href="#" class="btn btn-outline-primary">Lihat Produk</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
