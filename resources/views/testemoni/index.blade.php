@extends('layouts.home')

@section('title', 'Testimoni Pelanggan - Kukerku')

@push('styles')
<style>
    .testimonial-page {
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

    .testimonial-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        height: 100%;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .testimonial-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .customer-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.5rem;
        color: white;
        font-weight: bold;
    }

    .customer-info h4 {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
    }

    .customer-location {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-top: 0.25rem;
    }

    .rating {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stars {
        color: #ffc107;
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .rating-text {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .testimonial-content {
        font-style: italic;
        color: var(--text-dark);
        line-height: 1.6;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .testimonial-content::before {
        content: '"';
        font-size: 4rem;
        color: var(--primary-light);
        position: absolute;
        top: -1rem;
        left: -0.5rem;
        font-family: serif;
        opacity: 0.3;
    }

    .product-purchased {
        background: var(--bg-light);
        padding: 1rem;
        border-radius: 10px;
        border-left: 4px solid var(--primary-color);
    }

    .product-label {
        font-size: 0.8rem;
        color: var(--text-light);
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        font-weight: 600;
    }

    .product-name {
        color: var(--primary-color);
        font-weight: 600;
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

    .stats-section {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        margin: 4rem 0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    .stat-item {
        text-align: center;
        padding: 1.5rem;
        background: var(--bg-light);
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        color: var(--primary-color);
        display: block;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: var(--text-dark);
        font-weight: 600;
    }

    .highlight-testimonial {
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        color: white;
        margin: 4rem 0;
    }

    .highlight-testimonial .testimonial-content {
        color: white;
        font-size: 1.1rem;
    }

    .highlight-testimonial .customer-info h4 {
        color: white;
    }

    .highlight-testimonial .customer-location {
        color: rgba(255,255,255,0.8);
    }

    .highlight-testimonial .product-purchased {
        background: rgba(255,255,255,0.2);
        border-left-color: white;
    }

    .highlight-testimonial .product-name {
        color: white;
    }

    .highlight-testimonial .product-label {
        color: rgba(255,255,255,0.8);
    }

    .cta-section {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-top: 4rem;
    }

    .cta-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
    }

    .cta-subtitle {
        color: var(--text-light);
        margin-bottom: 2rem;
    }

    .btn-cta {
        display: inline-block;
        padding: 1rem 2rem;
        background: var(--primary-color);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin: 0 0.5rem;
    }

    .btn-cta:hover {
        background: var(--primary-dark);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .btn-cta.secondary {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
    }

    .btn-cta.secondary:hover {
        background: var(--primary-color);
        color: white;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }

        .testimonial-header {
            flex-direction: column;
            text-align: center;
        }

        .customer-avatar {
            margin-right: 0;
            margin-bottom: 1rem;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .btn-cta {
            display: block;
            margin: 0.5rem 0;
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

    .fade-in:nth-child(4) {
        animation-delay: 0.6s;
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
<div class="container testimonial-page">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Testimoni</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1 class="page-title">Testimoni Pelanggan</h1>
        <p class="page-subtitle">
            Dengarkan pengalaman nyata dari pelanggan setia Kukerku yang telah merasakan kelezatan produk kami
        </p>
    </div>

    <!-- Stats Section -->
    <div class="stats-section fade-in">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">500+</span>
                <span class="stat-label">Pelanggan Puas</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">4.9</span>
                <span class="stat-label">Rating Rata-rata</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">95%</span>
                <span class="stat-label">Repeat Order</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100+</span>
                <span class="stat-label">Review Positif</span>
            </div>
        </div>
    </div>

    <!-- Highlight Testimonial -->
    <div class="testimonial-card highlight-testimonial fade-in">
        <div class="testimonial-header">
            <div class="customer-avatar">S</div>
            <div class="customer-info">
                <h4>Sari Dewi</h4>
                <div class="customer-location">Jakarta Selatan</div>
            </div>
        </div>
        <div class="rating">
            <div class="stars">★★★★★</div>
            <span class="rating-text">5.0</span>
        </div>
        <div class="testimonial-content">
            Sudah 3 tahun jadi pelanggan setia Kukerku! Kue keringnya selalu fresh, renyah, dan rasanya konsisten. Kemarin pesan paket lebaran, semua keluarga bilang ini kue kering terenak yang pernah mereka coba. Packaging-nya juga cantik banget, cocok buat hadiah. Pokoknya Kukerku adalah pilihan terbaik untuk kue kering premium!
        </div>
        <div class="product-purchased">
            <div class="product-label">Produk yang dibeli</div>
            <div class="product-name">Paket Lebaran Premium + Nastar Keju + Kastengel Original</div>
        </div>
    </div>

    <!-- Regular Testimonials -->
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">R</div>
                    <div class="customer-info">
                        <h4>Rina Hartono</h4>
                        <div class="customer-location">Surabaya</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Nastar kejunya enak banget! Kejunya berasa dan tidak terlalu manis. Cocok buat cemilan sambil ngopi. Pengiriman juga cepat, cuma 2 hari sampai Surabaya.
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Nastar Keju Special</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">A</div>
                    <div class="customer-info">
                        <h4>Ahmad Fauzi</h4>
                        <div class="customer-location">Bandung</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Kastengel originalnya crispy banget! Rasa kejunya pas, tidak terlalu asin. Kemasan juga rapi dan kedap udara jadi kue tetap renyah sampai habis.
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Kastengel Original</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">L</div>
                    <div class="customer-info">
                        <h4>Lisa Permata</h4>
                        <div class="customer-location">Medan</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Paket hematnya worth it banget! Dapat 5 macam kue kering dengan harga yang sangat terjangkau. Semua rasanya enak dan berkualitas.
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Paket Hemat 5 Varian</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">D</div>
                    <div class="customer-info">
                        <h4>Dian Sasanti</h4>
                        <div class="customer-location">Yogyakarta</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Chocolate crinklesnya lumer di mulut! Anak-anak suka banget. Teksturnya lembut dan cokelatnya premium. Pasti order lagi!
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Chocolate Crinkles</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">M</div>
                    <div class="customer-info">
                        <h4>Maya Sari</h4>
                        <div class="customer-location">Semarang</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Putri salju dan lidah kucingnya mantap! Teksturnya pas, tidak terlalu keras atau lembek. Cocok buat teman minum teh sore.
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Putri Salju + Lidah Kucing</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">B</div>
                    <div class="customer-info">
                        <h4>Budi Santoso</h4>
                        <div class="customer-location">Malang</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Semprit susunya enak dan tidak terlalu manis. Bentuknya juga cantik. Istri saya sampai minta resepnya karena penasaran. Recommended!
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Semprit Susu Premium</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">I</div>
                    <div class="customer-info">
                        <h4>Indah Lestari</h4>
                        <div class="customer-location">Bekasi</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Paling suka sama sagu keju dan kacang mete renyahnya. Bener-bener nagih! Kemasan juga aman, sampai rumah masih utuh dan fresh.
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Sagu Keju + Kacang Mete Renyah</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">T</div>
                    <div class="customer-info">
                        <h4>Tami Wahyuni</h4>
                        <div class="customer-location">Tangerang</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Stick kejunya unik dan enak! Bentuknya lucu, anak-anak suka banget. Rasanya gurih dan tidak berminyak. Jadi cemilan favorit keluarga.
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Stick Keju Crispy</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="testimonial-card fade-in">
                <div class="testimonial-header">
                    <div class="customer-avatar">K</div>
                    <div class="customer-info">
                        <h4>Kevin Wijaya</h4>
                        <div class="customer-location">Bogor</div>
                    </div>
                </div>
                <div class="rating">
                    <div class="stars">★★★★★</div>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    Paket spesial lebaran kemarin jadi bintang di rumah! Semua tamu puji kue keringnya. Packaging-nya juga elegant, cocok buat hadiah.
                </div>
                <div class="product-purchased">
                    <div class="product-label">Produk yang dibeli</div>
                    <div class="product-name">Paket Spesial Lebaran</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section fade-in">
        <h3 class="cta-title">Bergabunglah dengan Ribuan Pelanggan Puas!</h3>
        <p class="cta-subtitle">Rasakan sendiri kelezatan kue kering premium Kukerku dan berikan testimoni Anda</p>
        <a href="{{ route('product.list') }}" class="btn-cta">Pesan Sekarang</a>
        <a href="{{ route('contact.index') }}" class="btn-cta secondary">Hubungi Kami</a>
    </div>
</div>

@push('scripts')
<script>
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

    // Add hover effects for testimonial cards
    document.querySelectorAll('.testimonial-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Animate stats numbers
    function animateNumbers() {
        const statNumbers = document.querySelectorAll('.stat-number');

        statNumbers.forEach(stat => {
            const finalNumber = stat.textContent;
            const isPercentage = finalNumber.includes('%');
            const isRating = finalNumber.includes('.');
            const number = parseFloat(finalNumber.replace(/[^0-9.]/g, ''));

            let current = 0;
            const increment = number / 30;
            const timer = setInterval(() => {
                current += increment;
                if (current >= number) {
                    current = number;
                    clearInterval(timer);
                }

                if (isRating) {
                    stat.textContent = current.toFixed(1);
                } else if (isPercentage) {
                    stat.textContent = Math.floor(current) + '%';
                } else if (finalNumber.includes('+')) {
                    stat.textContent = Math.floor(current) + '+';
                } else {
                    stat.textContent = Math.floor(current);
                }
            }, 50);
        });
    }

    // Trigger animation when stats section is visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumbers();
                observer.unobserve(entry.target);
            }
        });
    });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }
});
</script>
@endpush
@endsection
