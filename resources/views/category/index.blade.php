@extends('layouts.home')

@section('title', 'Kategori Produk - Kukerku')

@push('styles')
<style>
    .category-list {
        padding: 2rem 0 4rem;
    }

    .page-header {
        text-align: center;
        margin-bottom: 4rem;
        padding: 3rem 0;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        border-radius: 20px;
        color: white;
    }

    .page-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .page-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .category-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        height: 100%;
        margin-bottom: 2rem;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    }

    .category-image {
        position: relative;
        height: 300px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .category-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .category-card:hover .category-image::before {
        transform: translateX(100%);
    }

    .category-icon {
        font-size: 8rem;
        color: white;
        text-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: transform 0.3s ease;
    }

    .category-card:hover .category-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .category-content {
        padding: 2rem;
    }

    .category-name {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
        text-align: center;
    }

    .category-description {
        font-size: 1rem;
        line-height: 1.6;
        color: var(--text-light);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .category-features {
        list-style: none;
        padding: 0;
        margin-bottom: 2rem;
    }

    .category-features li {
        padding: 0.5rem 0;
        color: var(--text-light);
        position: relative;
        padding-left: 1.5rem;
    }

    .category-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
    }

    .category-stats {
        display: flex;
        justify-content: space-around;
        margin-bottom: 2rem;
        padding: 1rem;
        background: var(--bg-light);
        border-radius: 15px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        display: block;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--text-light);
        margin-top: 0.25rem;
    }

    .btn-explore {
        display: block;
        width: 100%;
        padding: 1rem 2rem;
        background: var(--primary-color);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        text-align: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-explore:hover {
        background: var(--primary-dark);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin-bottom: 2rem;
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

    .info-section {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        margin-top: 4rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .info-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-dark);
        text-align: center;
        margin-bottom: 2rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .info-item {
        text-align: center;
        padding: 1.5rem;
        background: var(--bg-light);
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .info-item:hover {
        transform: translateY(-5px);
    }

    .info-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .info-item h4 {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .info-item p {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }

        .category-name {
            font-size: 1.5rem;
        }

        .category-stats {
            flex-direction: column;
            gap: 1rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }

    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .fade-in:nth-child(2) {
        animation-delay: 0.2s;
    }

    .fade-in:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('content')
<div class="container category-list">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Produk</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1 class="page-title">Kategori Produk Kukerku</h1>
        <p class="page-subtitle">
            Temukan berbagai pilihan kue kering berkualitas premium kami yang tersedia dalam dua kategori utama
        </p>
    </div>

    <!-- Category Cards -->
    <div class="row">
        <!-- Kategori Satuan -->
        <div class="col-lg-6">
            <div class="category-card fade-in">
                <div class="category-image">
                    <div class="category-icon">🍪</div>
                </div>
                <div class="category-content">
                    <h2 class="category-name">Produk Satuan</h2>
                    <p class="category-description">
                        Koleksi kue kering premium yang dijual dalam kemasan individual. Cocok untuk konsumsi pribadi,
                        camilan sehari-hari, atau sebagai oleh-oleh dalam jumlah terbatas.
                    </p>

                    <ul class="category-features">
                        <li>Kemasan praktis dan mudah dibawa</li>
                        <li>Porsi pas untuk konsumsi pribadi</li>
                        <li>Harga terjangkau untuk semua kalangan</li>
                        <li>Ideal untuk mencoba berbagai varian rasa</li>
                        <li>Kemasan kedap udara untuk menjaga kerenyahan</li>
                    </ul>

                    <div class="category-stats">
                        <div class="stat-item">
                            <span class="stat-number">200g</span>
                            <span class="stat-label">Kemasan</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">15+</span>
                            <span class="stat-label">Varian Rasa</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">2-3</span>
                            <span class="stat-label">Minggu Tahan</span>
                        </div>
                    </div>

                    <a href="{{ route('product.Satuan') }}" class="btn-explore">
                        Jelajahi Produk Satuan
                    </a>
                </div>
            </div>
        </div>

        <!-- Kategori Paketan -->
        <div class="col-lg-6">
            <div class="category-card fade-in">
                <div class="category-image">
                    <div class="category-icon">📦</div>
                </div>
                <div class="category-content">
                    <h2 class="category-name">Produk Paketan</h2>
                    <p class="category-description">
                        Paket hemat berisi berbagai macam kue kering pilihan dalam satu kemasan. Sempurna untuk acara spesial,
                        arisan, atau sebagai hadiah untuk orang terkasih.
                    </p>

                    <ul class="category-features">
                        <li>Kombinasi berbagai rasa dalam satu paket</li>
                        <li>Harga lebih hemat dibanding beli satuan</li>
                        <li>Kemasan cantik cocok untuk hadiah</li>
                        <li>Pilihan ideal untuk acara dan perayaan</li>
                        <li>Porsi besar untuk berbagi bersama keluarga</li>
                    </ul>

                    <div class="category-stats">
                        <div class="stat-item">
                            <span class="stat-number">500g</span>
                            <span class="stat-label">Kemasan</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">3-5</span>
                            <span class="stat-label">Varian/Paket</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">20%</span>
                            <span class="stat-label">Lebih Hemat</span>
                        </div>
                    </div>

                    <a href="{{ route('product.Paketan') }}" class="btn-explore">
                        Jelajahi Produk Paketan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="info-section fade-in">
        <h3 class="info-title">Mengapa Memilih Kukerku?</h3>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-icon">🏆</div>
                <h4>Kualitas Premium</h4>
                <p>Menggunakan bahan-bahan pilihan berkualitas tinggi untuk hasil terbaik</p>
            </div>
            <div class="info-item">
                <div class="info-icon">👩‍🍳</div>
                <h4>Resep Turun Temurun</h4>
                <p>Dibuat dengan resep rahasia keluarga yang telah terbukti lezat</p>
            </div>
            <div class="info-item">
                <div class="info-icon">📦</div>
                <h4>Kemasan Aman</h4>
                <p>Dikemas dengan rapi dan aman untuk menjaga kesegaran produk</p>
            </div>
            <div class="info-item">
                <div class="info-icon">🚚</div>
                <h4>Pengiriman Cepat</h4>
                <p>Layanan pengiriman yang cepat dan terpercaya ke seluruh Indonesia</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Simple animation observer
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add hover effects for better interactivity
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>
@endpush
@endsection
