@extends('layouts.home')

@section('title', 'Tentang Kami - Kukerku')

@push('styles')
    <style>
        .about-page {
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
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .page-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .story-section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 4rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .story-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .story-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
            text-align: justify;
            margin-bottom: 2rem;
        }

        .story-content p {
            margin-bottom: 1.5rem;
        }

        .highlight-text {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
        }

        .journey-timeline {
            position: relative;
            margin: 3rem 0;
        }

        .timeline-item {
            display: flex;
            margin-bottom: 3rem;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 30px;
            top: 60px;
            width: 2px;
            height: calc(100% + 2rem);
            background: var(--primary-light);
            opacity: 0.3;
        }

        .timeline-item:last-child::before {
            display: none;
        }

        .timeline-year {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            margin-right: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .timeline-content {
            flex: 1;
            background: var(--bg-light);
            padding: 2rem;
            border-radius: 15px;
            margin-top: 10px;
        }

        .timeline-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .timeline-description {
            color: var(--text-light);
            line-height: 1.6;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .value-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .value-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .value-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .value-description {
            color: var(--text-light);
            line-height: 1.6;
        }

        .founder-section {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            align-items: center;
            margin: 3rem 0;
        }

        .founder-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .founder-placeholder {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 8rem;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .founder-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .founder-quote {
            font-style: italic;
            font-size: 1.1rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 2rem;
        }

        .founder-quote::before {
            content: '"';
            position: absolute;
            left: 0;
            top: -0.5rem;
            font-size: 3rem;
            color: var(--primary-light);
            font-family: serif;
        }

        .location-info {
            background: var(--bg-light);
            padding: 2rem;
            border-radius: 15px;
            margin: 3rem 0;
            text-align: center;
        }

        .location-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .location-details {
            color: var(--text-light);
            line-height: 1.6;
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

        .breadcrumb-custom .breadcrumb-item+.breadcrumb-item::before {
            color: var(--text-light);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
            color: white;
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            margin-top: 4rem;
        }

        .cta-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .btn-cta {
            display: inline-block;
            padding: 1rem 2rem;
            background: white;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 0.5rem;
        }

        .btn-cta:hover {
            background: var(--bg-light);
            color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .founder-section {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .timeline-item {
                flex-direction: column;
                text-align: center;
            }

            .timeline-year {
                margin: 0 auto 1rem;
            }

            .timeline-item::before {
                display: none;
            }

            .values-grid {
                grid-template-columns: 1fr;
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
    <div class="container about-page">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="page-header fade-in">
            <h1 class="page-title">Tentang Kukerku</h1>
            <p class="page-subtitle">
                Perjalanan cita rasa dari Cikampek, Karawang untuk menghadirkan kue kering terbaik ke seluruh Indonesia
            </p>
        </div>

        <!-- Story Section -->
        <div class="story-section fade-in">
            <h2 class="section-title">Cerita Kami</h2>
            <div class="story-content">
                <p>
                    <span class="highlight-text">Kukerku</span> lahir dari dapur sederhana di <span
                        class="highlight-text">Cikampek, Karawang</span> pada tahun 2018.
                    Dimulai dari kecintaan seorang ibu rumah tangga terhadap seni membuat kue kering, kami percaya bahwa
                    setiap gigitan
                    harus menghadirkan kebahagiaan dan kehangatan keluarga.
                </p>
                <p>
                    Dengan <span class="highlight-text">resep turun temurun</span> yang telah dipadu dengan inovasi modern,
                    kami berkomitmen
                    untuk menghadirkan kue kering berkualitas premium yang tidak hanya lezat, tetapi juga dibuat dengan
                    penuh cinta dan
                    perhatian terhadap detail.
                </p>
                <p>
                    Dari awal yang sederhana hingga kini melayani ribuan pelanggan di seluruh Indonesia, perjalanan Kukerku
                    adalah
                    bukti bahwa <span class="highlight-text">kualitas dan konsistensi</span> adalah kunci untuk membangun
                    kepercayaan
                    dan menciptakan kenangan manis bersama keluarga.
                </p>
            </div>

            <!-- Founder Section -->
            <div class="founder-section">
                <div class="founder-image">
                    <div class="founder-placeholder">👩‍🍳</div>
                </div>
                <div class="founder-content">
                    <h3>Ibu Sari - Founder Kukerku</h3>
                    <div class="founder-quote">
                        Setiap kue yang kami buat adalah wujud kasih sayang untuk keluarga Indonesia.
                        Kami tidak hanya menjual kue, tapi menghadirkan kebahagiaan dalam setiap kemasan.
                    </div>
                    <p class="story-content">
                        Dengan pengalaman lebih dari 15 tahun dalam dunia kuliner, Ibu Sari memulai Kukerku
                        dari passion dan keinginan untuk berbagi kelezatan kue kering tradisional dengan cita rasa modern.
                        Beliau percaya bahwa makanan terbaik adalah yang dibuat dengan hati.
                    </p>
                </div>
            </div>
        </div>

        <!-- Journey Timeline -->
        <div class="story-section fade-in">
            <h2 class="section-title">Perjalanan Kami</h2>
            <div class="journey-timeline">
                <div class="timeline-item">
                    <div class="timeline-year">2018</div>
                    <div class="timeline-content">
                        <h4 class="timeline-title">Awal Mula</h4>
                        <p class="timeline-description">
                            Kukerku dimulai dari dapur rumah sederhana di Cikampek dengan 3 varian kue kering pertama:
                            Nastar, Kastengel, dan Putri Salju. Melayani tetangga dan kerabat dengan produksi manual.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2019</div>
                    <div class="timeline-content">
                        <h4 class="timeline-title">Ekspansi Produk</h4>
                        <p class="timeline-description">
                            Menambah 7 varian baru dan mulai melayani pesanan untuk acara-acara khusus seperti lebaran,
                            arisan, dan perayaan keluarga. Mulai dikenal di wilayah Karawang.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2020</div>
                    <div class="timeline-content">
                        <h4 class="timeline-title">Era Digital</h4>
                        <p class="timeline-description">
                            Meluncurkan layanan online dan memulai pengiriman ke luar kota. Pandemi membuat kami
                            berinovasi dengan sistem pemesanan digital dan kemasan yang lebih aman.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2021</div>
                    <div class="timeline-content">
                        <h4 class="timeline-title">Sertifikasi & Standarisasi</h4>
                        <p class="timeline-description">
                            Mendapat sertifikasi PIRT dan mulai menerapkan standar produksi yang lebih ketat.
                            Membuka workshop kecil untuk meningkatkan kapasitas produksi.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2022</div>
                    <div class="timeline-content">
                        <h4 class="timeline-title">Jangkauan Nasional</h4>
                        <p class="timeline-description">
                            Berhasil melayani pelanggan di lebih dari 20 kota di Indonesia. Meluncurkan program
                            "Paket Hemat" untuk menjangkau lebih banyak keluarga Indonesia.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2023</div>
                    <div class="timeline-content">
                        <h4 class="timeline-title">Inovasi Premium</h4>
                        <p class="timeline-description">
                            Memperkenalkan lini produk premium dengan kemasan eksklusif. Membuka kemitraan dengan
                            berbagai toko kue dan marketplace untuk memperluas distribusi.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2024</div>
                    <div class="timeline-content">
                        <h4 class="timeline-title">Masa Kini</h4>
                        <p class="timeline-description">
                            Kukerku kini telah melayani lebih dari 5000 pelanggan dengan 15+ varian kue kering.
                            Terus berinovasi dan berkomitmen menghadirkan cita rasa terbaik untuk Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="story-section fade-in">
            <h2 class="section-title">Nilai-Nilai Kami</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">❤️</div>
                    <h3 class="value-title">Dibuat dengan Cinta</h3>
                    <p class="value-description">
                        Setiap kue dibuat dengan penuh kasih sayang dan perhatian, seperti memasak untuk keluarga sendiri.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">🏆</div>
                    <h3 class="value-title">Kualitas Premium</h3>
                    <p class="value-description">
                        Menggunakan bahan-bahan pilihan terbaik dan proses produksi yang terjaga untuk hasil sempurna.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3 class="value-title">Kepercayaan Pelanggan</h3>
                    <p class="value-description">
                        Membangun hubungan jangka panjang dengan pelanggan melalui konsistensi dan pelayanan terbaik.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">🌱</div>
                    <h3 class="value-title">Inovasi Berkelanjutan</h3>
                    <p class="value-description">
                        Terus mengembangkan produk dan layanan untuk memenuhi kebutuhan dan selera yang berkembang.
                    </p>
                </div>
            </div>
        </div>

        <!-- Location Info -->
        <div class="story-section fade-in">
            <div class="location-info">
                <h3 class="location-title">🏭 Lokasi Produksi Kami</h3>
                <div class="location-details">
                    <p><strong>Kukerku Production House</strong></p>
                    <p>📍 Cikampek, Kabupaten Karawang, Jawa Barat</p>
                    <p>
                        Dipilih karena akses mudah ke bahan baku berkualitas dan lokasi strategis untuk distribusi
                        ke seluruh Jawa dan Indonesia. Fasilitas produksi modern dengan standar kebersihan tinggi
                        memastikan setiap produk yang dihasilkan aman dan berkualitas.
                    </p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section fade-in">
            <h3 class="cta-title">Mari Bergabung dalam Perjalanan Rasa Kami</h3>
            <p class="cta-subtitle">
                Rasakan pengalaman berbelanja kue kering premium yang tak terlupakan bersama Kukerku
            </p>
            <a href="{{ route('product.list') }}" class="btn-cta">Jelajahi Produk</a>
            <a href="{{ route('contact.index') }}" class="btn-cta">Hubungi Kami</a>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
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

                // Add hover effects for value cards
                document.querySelectorAll('.value-card').forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-10px) scale(1.05)';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0) scale(1)';
                    });
                });

                // Timeline animation on scroll
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateX(0)';
                        }
                    });
                }, observerOptions);

                // Observe timeline items
                document.querySelectorAll('.timeline-item').forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = index % 2 === 0 ? 'translateX(-50px)' : 'translateX(50px)';
                    item.style.transition = 'all 0.6s ease';
                    observer.observe(item);
                });

                // Add parallax effect to founder section
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const founderImage = document.querySelector('.founder-placeholder');
                    if (founderImage) {
                        const rate = scrolled * -0.1;
                        founderImage.style.transform = `translateY(${rate}px)`;
                    }
                });
            });
        </script>
    @endpush
@endsection
