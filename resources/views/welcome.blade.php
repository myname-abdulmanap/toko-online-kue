@extends('layouts.home')

@section('title', 'Kukerku Ncip - Kue Kering Premium Terbaik')

@push('styles')
    <style>
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--bg-cream) 0%, var(--bg-light) 100%);
            padding: 6rem 0 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="%23D2B48C" opacity="0.3"/><circle cx="80" cy="40" r="1.5" fill="%238B4513" opacity="0.2"/><circle cx="40" cy="80" r="2.5" fill="%23F4A460" opacity="0.3"/></svg>') repeat;
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-image {
            position: relative;
            text-align: center;
        }

        .floating-cookie {
            font-size: 4rem;
            animation: float 3s ease-in-out infinite;
            display: inline-block;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Features Section */
        .features-section {
            padding: 5rem 0;
            background: white;
        }

        .feature-card {
            background: var(--bg-cream);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(139, 69, 19, 0.1);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        .feature-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Products Section */
        .products-section {
            padding: 5rem 0;
            background: var(--bg-light);
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(139, 69, 19, 0.1);
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(139, 69, 19, 0.2);
        }

        .product-image {
            height: 200px;
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
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .product-description {
            color: var(--text-light);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .btn-order {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: inline-block;
            width: 100%;
        }

        .btn-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 69, 19, 0.3);
            color: white;
        }

        /* CTA Section */
        .cta-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: move 20s linear infinite;
        }

        @keyframes move {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(50px, 50px);
            }
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            color: var(--text-light);
            text-align: center;
            margin-bottom: 3rem;
            font-size: 1.1rem;
        }

        .btn-view-more {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 2rem;
        }

        .btn-view-more:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 69, 19, 0.3);
        }

        /* Empty State */
        .empty-products {
            text-align: center;
            padding: 3rem 0;
            color: var(--text-light);
        }

        .empty-products-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title fade-in">
                            Kue Kering <span style="color: var(--primary-color);">Premium</span><br>
                            untuk Keluarga
                        </h1>
                        <p class="hero-subtitle fade-in">
                            Nikmati kelezatan kue kering berkualitas premium yang dibuat dengan resep terbaik dan
                            bahan-bahan pilihan terbaik. Sempurna untuk berbagai momen spesial keluarga.
                        </p>
                        <div class="d-flex flex-wrap gap-3 fade-in">
                            <a href="{{ url('/product') }}" class="btn-primary-custom">
                                Lihat Produk
                            </a>
                            <a href="{{ url('/contact') }}" class="btn-outline-custom">
                                Hubungi Kami
                            </a>
                            <br />
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center">
                    <div class="hero-image fade-in text-center">
                        <br />
                        <img src="/img/logo.jpeg" class="img-fluid rounded shadow"
                            style="max-width: 300px; width: 100%;" alt="Logo">
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title fade-in">Mengapa Memilih <span
                            style="color: var(--primary-color);">{{ config('app.company') }}</span> ?</h2>
                    <p class="section-subtitle fade-in">Komitmen kami untuk menghadirkan yang terbaik</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <span class="feature-icon">🌟</span>
                        <h3 class="feature-title">Bahan Premium</h3>
                        <p class="text-muted">Menggunakan bahan-bahan berkualitas tinggi yang dipilih secara selektif untuk
                            menghasilkan rasa terbaik.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <span class="feature-icon">👩‍🍳</span>
                        <h3 class="feature-title">Resep Turun Temurun</h3>
                        <p class="text-muted">Dibuat dengan resep keluarga yang telah teruji puluhan tahun dan disempurnakan
                            dari generasi ke generasi.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <span class="feature-icon">🎁</span>
                        <h3 class="feature-title">Kemasan Mewah</h3>
                        <p class="text-muted">Dikemas dengan cantik dan elegan, cocok untuk hadiah atau konsumsi pribadi
                            bersama keluarga.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title fade-in">Produk Unggulan</h2>
                    <p class="section-subtitle fade-in">Pilihan terbaik untuk setiap momen spesial</p>
                </div>
            </div>

            @if ($featuredProducts->count() > 0)
                <div class="row g-4">
                    @foreach ($featuredProducts as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product-card fade-in">
                                <div class="product-image">
                                    @if ($product->img)
                                        <img src="{{ asset('/' . $product->img) }}" alt="{{ $product->name }}">
                                    @else
                                        🍪
                                    @endif
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title">{{ $product->name }}</h3>

                                    @if ($product->description)
                                        <p class="product-description">{{ $product->description }}</p>
                                    @endif

                                    <div class="product-price">
                                        @if ($product->price_200_gram)
                                            Mulai dari Rp {{ number_format($product->price_200_gram, 0, ',', '.') }}
                                        @elseif($product->price_500_gram)
                                            Mulai dari Rp {{ number_format($product->price_500_gram, 0, ',', '.') }}
                                        @else
                                            Hubungi untuk harga
                                        @endif
                                    </div>

                                    <a href="{{ route('product.show', $product->id) }}" class="btn-order">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tombol Lihat Produk Lainnya -->
                <div class="text-center fade-in">
                    <a href="{{ url('/product') }}" class="btn-view-more">
                        🍪 Lihat Produk Lainnya
                    </a>
                </div>
            @else
                <div class="empty-products fade-in">
                    <div class="empty-products-icon">🍪</div>
                    <h3 class="mb-3">Produk Segera Hadir</h3>
                    <p class="mb-4">Kami sedang mempersiapkan produk-produk kue kering premium terbaik untuk Anda. Silakan
                        hubungi kami untuk informasi lebih lanjut.</p>
                    <a href="{{ url('/kontak') }}" class="btn-primary-custom">Hubungi Kami</a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title fade-in">Siap Menikmati Kelezatan Premium?</h2>
                <p class="mb-4 fade-in" style="font-size: 1.1rem; opacity: 0.9;">
                    Hubungi kami sekarang untuk pemesanan atau konsultasi kebutuhan kue kering spesial Anda
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3 fade-in">
                    <a href="https://wa.me/6289688037437" class="btn-outline-custom"
                        style="border-color: white; color: white;">
                        💬 WhatsApp
                    </a>
                    <a href="{{ url('/contact') }}" class="btn-primary-custom"
                        style="background: white; color: var(--primary-color);">
                        📞 Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
