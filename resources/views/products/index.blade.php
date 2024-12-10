@extends('layouts.app')

@section('title', 'Produk Toko - Tokopakedi')

@section('content')
<div class="container">
    <h1 class="mb-4">Produk Toko</h1>

    <form action="{{ url('/products') }}" method="GET" class="mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <input type="number" name="min_price" class="form-control" placeholder="Harga Min" value="{{ request('min_price') }}" min="0">
            </div>
            <div class="col-md-2">
                <input type="number" name="max_price" class="form-control" placeholder="Harga Max" value="{{ request('max_price') }}" min="0">
            </div>
            <div class="col-md-2">
                <select name="sort_by" class="form-select">
                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Urutkan berdasarkan Nama</option>
                    <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Urutkan berdasarkan Harga</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort_order" class="form-select">
                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Urutan Naik</option>
                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Urutan Menurun</option>
                </select>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary w-100" type="submit">Filter</button>
            </div>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            <small class="text-muted">Kategori: {{ $product->category->name }}</small>
                        </p>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <form action="{{ url('/cart/add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-cart-plus me-2"></i>Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection