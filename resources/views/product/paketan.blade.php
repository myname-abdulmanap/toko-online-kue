@extends('layouts.home')

@section('title', 'Produk Paketan - Kukerku')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, var(--bg-cream) 0%, var(--bg-light) 100%);
        padding: 3rem 0 2rem;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="%23D2B48C" opacity="0.3"/><circle cx="80" cy="40" r="1.5" fill="%238B4513" opacity="0.2"/><circle cx="40" cy="80" r="2.5" fill="%23F4A460" opacity="0.3"/></svg>') repeat;
        opacity: 0.1;
    }

    .page-header-content {
        position: relative;
        z-index: 2;
    }

    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin-bottom: 1rem;
    }

    .breadcrumb-custom .breadcrumb-item {
        color: var(--text-light);
    }

    .breadcrumb-custom .breadcrumb-item.active {
        color: var(--primary-color);
        font-weight: 600;
    }

    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
        color: var(--text-light);
    }

    .products-grid {
        padding: 3rem 0;
    }

    .product-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid rgba(139, 69, 19, 0.1);
        height: 100%;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15);
    }

    .product-image {
        height: 250px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        position: relative;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .product-content {
        padding: 2rem;
    }

    .product-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .product-description {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .price-section {
        margin-bottom: 1.5rem;
    }

    .price-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(139, 69, 19, 0.1);
    }

    .price-item:last-child {
        border-bottom: none;
    }

    .price-label {
        color: var(--text-light);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .price-value {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.1rem;
    }

    .product-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-order {
        flex: 1;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border: none;
        padding: 0.75rem 1rem;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-order:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 69, 19, 0.3);
        color: white;
    }

    .btn-detail {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 0.75rem 1rem;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        white-space: nowrap;
    }

    .btn-detail:hover {
        background: var(--primary-color);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--text-light);
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .filter-section {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .search-box {
        border: 2px solid rgba(139, 69, 19, 0.1);
        border-radius: 10px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .search-box:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.1);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-actions {
            flex-direction: column;
        }

        .btn-detail {
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk Paketan</li>
                </ol>
            </nav>
            <h1 class="display-4 font-display fw-bold text-dark mb-3">Produk Paketan</h1>
            <p class="lead text-muted mb-0">Pilih kue kering premium favorit Anda dalam kemasan paketan yang praktis</p>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="products-grid">
    <div class="container">
        <!-- Filter Section -->
        <div class="filter-section fade-in">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-3 mb-md-0">
                        <span class="text-muted">Menampilkan</span>
                        <span class="fw-bold text-primary">{{ $products->count() }}</span>
                        <span class="text-muted">produk paketan</span>
                    </h5>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control search-box" placeholder="Cari produk..." id="searchInput">
                        <button class="btn btn-outline-secondary" type="button">
                            🔍
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if($products->count() > 0)
            <div class="row g-4" id="productsContainer">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 product-item" data-name="{{ strtolower($product->name) }}">
                        <div class="product-card fade-in">
                            <div class="product-image">
                                @if($product->img)
                                    <img src="{{ asset('/' . $product->img) }}" alt="{{ $product->name }}">
                                @else
                                    🍪
                                @endif
                            </div>

                            <div class="product-content">
                                <h3 class="product-title">{{ $product->name }}</h3>

                                @if($product->description)
                                    <p class="product-description">{{ $product->description }}</p>
                                @endif

                                <div class="price-section">
                                    @if($product->price_200_gram)
                                        <div class="price-item">
                                            <span class="price-label">200 gram</span>
                                            <span class="price-value">Rp {{ number_format($product->price_200_gram, 0, ',', '.') }}</span>
                                        </div>
                                    @endif

                                    @if($product->price_500_gram)
                                        <div class="price-item">
                                            <span class="price-label">500 gram</span>
                                            <span class="price-value">Rp {{ number_format($product->price_500_gram, 0, ',', '.') }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="product-actions">

                                    <a href="{{ route('product.show', $product->id) }}" class="btn-order">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state fade-in">
                <div class="empty-state-icon">🍪</div>
                <h3 class="mb-3">Belum Ada Produk Satuan</h3>
                <p class="mb-4">Produk paketan sedang dalam proses persiapan. Silakan cek kembali nanti atau lihat produk paket kami.</p>
                <a href="{{ url('/product/category') }}" class="btn-primary-custom">Lihat Produk Paket</a>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: var(--bg-light);">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="font-display fw-bold mb-3">Butuh Bantuan Memilih?</h3>
                <p class="text-muted mb-4">Tim kami siap membantu Anda menemukan produk yang tepat sesuai kebutuhan dan selera</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="https://wa.me/6281234567890" class="btn-primary-custom">
                        💬 Chat WhatsApp
                    </a>
                    <a href="{{ url('/contact') }}" class="btn-outline-custom">
                        📞 Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const products = document.querySelectorAll('.product-item');

        products.forEach(product => {
            const productName = product.getAttribute('data-name');
            if (productName.includes(searchTerm)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });

    // Lazy loading for images
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));
</script>
@endpush
