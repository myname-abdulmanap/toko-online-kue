@extends('layouts.home')

@section('title', 'Hubungi Kami - Kukerku')

@push('styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .page-header {
        background: linear-gradient(135deg, var(--bg-cream) 0%, var(--bg-light) 100%);
        padding: 4rem 0 3rem;
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
        text-align: center;
    }

    .breadcrumb-custom {
        background: none;
        padding: 0;
        margin-bottom: 1rem;
        justify-content: center;
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

    .contact-section {
        padding: 5rem 0;
        background: white;
    }

    .contact-info-card {
        background: var(--bg-cream);
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(139, 69, 19, 0.1);
        transition: all 0.3s ease;
        height: 100%;
        text-align: center;
    }

    .contact-info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(139, 69, 19, 0.15);
    }

    .contact-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    .contact-info-card:hover .contact-icon {
        transform: scale(1.1);
        box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
    }

    .contact-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 1rem;
    }

    .contact-detail {
        color: var(--text-light);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .contact-action {
        margin-top: auto;
    }

    .btn-contact {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-contact:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 69, 19, 0.3);
        color: white;
    }

    .contact-form-section {
        padding: 5rem 0;
        background: var(--bg-light);
    }

    .form-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 30px rgba(139, 69, 19, 0.1);
        border: 1px solid rgba(139, 69, 19, 0.1);
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control-custom {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid rgba(139, 69, 19, 0.1);
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.1);
    }

    .form-control-custom::placeholder {
        color: #aaa;
    }

    textarea.form-control-custom {
        min-height: 120px;
        resize: vertical;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border: none;
        padding: 1rem 3rem;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(139, 69, 19, 0.3);
    }

    .social-media-section {
        padding: 4rem 0;
        background: rgb(220, 155, 155);
        text-align: center;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .social-link {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgb(0, 0, 0);
        font-size: 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .social-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: inherit;
        transition: all 0.3s ease;
        z-index: -1;
    }

    .social-link:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        color: rgb(0, 0, 0);
    }

    .social-whatsapp {
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
    }

    .social-instagram {
        background: linear-gradient(135deg, #E4405F 0%, #833AB4 50%, #F77737 100%);
    }

    .social-facebook {
        background: linear-gradient(135deg, #1877F2 0%, #42A5F5 100%);
    }

    .social-tiktok {
        background: linear-gradient(135deg, #000000 0%, #333333 100%);
    }

    .social-email {
        background: linear-gradient(135deg, #EA4335 0%, #FBBC05 100%);
    }

    .social-phone {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
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

    .map-section {
        padding: 4rem 0;
        background: var(--bg-light);
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(139, 69, 19, 0.1);
        height: 400px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        font-size: 1.1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-info-card {
            margin-bottom: 1.5rem;
        }

        .form-card {
            padding: 2rem;
        }

        .social-links {
            gap: 1rem;
        }

        .social-link {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .section-title {
            font-size: 2rem;
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
                    <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
                </ol>
            </nav>
            <h1 class="display-4 font-display fw-bold text-dark mb-3">Hubungi Kami</h1>
            <p class="lead text-muted mb-0">Kami siap membantu Anda dengan layanan terbaik</p>
        </div>
    </div>
</section>

<!-- Contact Info Section -->
<section class="contact-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="section-title fade-in">Cara Menghubungi Kami</h2>
                <p class="section-subtitle fade-in">Pilih cara yang paling nyaman untuk Anda</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- WhatsApp -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card fade-in">
                    <div class="contact-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h3 class="contact-title">WhatsApp</h3>
                    <p class="contact-detail">
                        Chat langsung dengan tim kami untuk pemesanan dan konsultasi produk
                        <br><strong>+6289688037437</strong>
                    </p>
                    <div class="contact-action">
                        <a href="https://wa.me/6289688037437?text=Halo, saya ingin bertanya tentang produk Kukerku" class="btn-contact" target="_blank">
                            <i class="fab fa-whatsapp me-2"></i>Chat Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Telepon -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card fade-in">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3 class="contact-title">Telepon</h3>
                    <p class="contact-detail">
                        Hubungi kami secara langsung untuk informasi lebih detail
                        <br><strong>+6289688037437</strong>
                    </p>
                    <div class="contact-action">
                        <a href="tel:+6289688037437" class="btn-contact">
                            <i class="fas fa-phone me-2"></i>Telepon Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card fade-in">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="contact-title">Email</h3>
                    <p class="contact-detail">
                        Kirim pertanyaan detail atau permintaan khusus melalui email
                        <br><strong>info@kukerku.com</strong>
                    </p>
                    <div class="contact-action">
                        <a href="mailto:info@kukerku.com?subject=Pertanyaan tentang Kukerku&body=Halo,%0D%0ASaya ingin bertanya tentang..." class="btn-contact">
                            <i class="fas fa-envelope me-2"></i>Kirim Email
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Social Media Section -->
<section class="social-media-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title fade-in">Ikuti Media Sosial Kami</h2>
                <p class="section-subtitle fade-in">Dapatkan update terbaru tentang produk dan promo menarik</p>

                <div class="social-links fade-in">
                    <a href="https://wa.me/6289688037437" class="social-link social-whatsapp" target="_blank" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://instagram.com/kukerku" class="social-link social-instagram" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://facebook.com/kukerku" class="social-link social-facebook" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://tiktok.com/@kukerku" class="social-link social-tiktok" target="_blank" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="mailto:info@kukerku.com" class="social-link social-email" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="tel:+6289688037437" class="social-link social-phone" title="Telepon">
                        <i class="fas fa-phone"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h2 class="section-title fade-in">Lokasi Kami</h2>
                <p class="section-subtitle fade-in">Kunjungi toko fisik kami untuk pengalaman berbelanja langsung</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="map-container fade-in">
                    <div class="text-center">
                        <i class="fas fa-map-marker-alt fa-3x mb-3" style="color: var(--primary-color);"></i>
                        <h4>Alamat Toko</h4>
                        <p class="mb-0">
                           Cikampek<br>
                            Karawang<br>
                            Jawa Barat, Indonesia
                        </p>
                        <p class="mt-3 mb-0">
                            <strong>Jam Operasional:</strong><br>
                            Senin - Sabtu: 08:00 - 20:00<br>
                            Minggu: 09:00 - 18:00
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


