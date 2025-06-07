@extends('layouts.home')

@section('title', $product->name . ' - Kukerku')

@push('styles')
<style>
    .product-detail {
        padding: 2rem 0 4rem;
    }

    .product-image-container {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
    }

    .product-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-image-container:hover img {
        transform: scale(1.05);
    }

    .product-image-placeholder {
        font-size: 8rem;
        color: white;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .product-info {
        padding-left: 2rem;
    }

    .product-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
    }

    .product-category {
        display: inline-block;
        background: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
    }

    .product-description {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--text-light);
        margin-bottom: 2rem;
    }

    .price-card {
        background: white;
        border: 2px solid var(--primary-color);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .price-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 1rem;
        text-align: center;
    }

    .price-option {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background: var(--bg-cream);
        border-radius: 10px;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid transparent;
    }

    .price-option:hover {
        background: var(--primary-light);
        transform: translateX(5px);
    }

    .price-option.selected {
        background: var(--primary-light);
        border-color: var(--primary-color);
        transform: translateX(5px);
    }

    .price-option:last-child {
        margin-bottom: 0;
    }

    .price-weight {
        font-weight: 600;
        color: var(--text-dark);
    }

    .price-amount {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .quantity-section {
        background: white;
        border: 2px solid var(--primary-color);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .quantity-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 1rem;
        text-align: center;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .quantity-btn {
        background: var(--primary-color);
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quantity-btn:hover {
        background: var(--primary-dark);
        transform: scale(1.1);
    }

    .quantity-input {
        width: 80px;
        text-align: center;
        font-size: 1.2rem;
        font-weight: 600;
        border: 2px solid var(--primary-color);
        border-radius: 10px;
        padding: 0.5rem;
    }

    .order-summary {
        background: var(--bg-light);
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .order-summary-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--text-dark);
        text-align: center;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
    }

    .summary-item:last-child {
        border-bottom: none;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--primary-color);
    }

    .order-section {
        background: var(--bg-light);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
    }

    .order-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--text-dark);
    }

    .order-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-whatsapp {
        background: #25D366;
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
    }

    .btn-whatsapp:hover {
        background: #128C7E;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
    }

    .btn-whatsapp:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
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

    .related-products {
        margin-top: 4rem;
        padding: 3rem 0;
        background: white;
        border-radius: 20px;
    }

    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
        margin-bottom: 1.5rem;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .product-image {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--accent-color) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: white;
        height: 200px;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-image:hover img {
        transform: scale(1.1);
    }

    .product-content {
        padding: 1.5rem;
    }

    .product-content .product-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
    }

    .product-price {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.1rem;
    }

    /* Mobile Responsive Styles */
    @media (max-width: 768px) {
        .product-detail {
            padding: 1rem 0 2rem;
        }

        .product-image-container {
            height: 250px;
            margin-bottom: 1rem;
            border-radius: 10px;
        }

        .product-image-placeholder {
            font-size: 5rem;
        }

        .product-info {
            padding-left: 0;
            margin-top: 1rem;
        }

        .product-title {
            font-size: 1.8rem;
            text-align: center;
        }

        .product-category {
            display: block;
            text-align: center;
            margin: 0 auto 1rem;
            width: fit-content;
        }

        .product-description {
            font-size: 1rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .price-card, .quantity-section, .order-summary, .order-section {
            margin-left: 1rem;
            margin-right: 1rem;
            padding: 1rem;
        }

        .order-buttons {
            flex-direction: column;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-whatsapp {
            width: 100%;
            max-width: 280px;
            justify-content: center;
            padding: 1rem;
        }

        .related-products {
            margin-top: 2rem;
            padding: 2rem 1rem;
        }

        .product-card {
            margin-bottom: 1rem;
        }

        .product-image {
            height: 180px;
            font-size: 2.5rem;
        }

        .product-content {
            padding: 1rem;
        }

        .product-content .product-title {
            font-size: 1.1rem;
        }

        .product-price {
            font-size: 1rem;
        }
    }

    /* Extra small devices */
    @media (max-width: 480px) {
        .product-image-container {
            height: 200px;
            margin: 0 0.5rem 1rem;
        }

        .product-image-placeholder {
            font-size: 4rem;
        }

        .product-title {
            font-size: 1.5rem;
        }

        .price-card, .quantity-section, .order-summary, .order-section {
            margin-left: 0.5rem;
            margin-right: 0.5rem;
        }

        .product-image {
            height: 150px;
            font-size: 2rem;
        }

        .related-products {
            padding: 1.5rem 0.5rem;
        }
    }

    /* Landscape orientation on mobile */
    @media (max-width: 768px) and (orientation: landscape) {
        .product-image-container {
            height: 180px;
        }

        .product-image {
            height: 120px;
        }
    }

    /* Utility classes for responsive images */
    .img-responsive {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .img-cover {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .img-contain {
        object-fit: contain;
        width: 100%;
        height: 100%;
    }
</style>
@endpush

@section('content')
<div class="container product-detail">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('product.' . $product->category) }}" class="text-decoration-none">
                    Produk {{ ucfirst($product->category) }}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Image -->
        <div class="col-lg-6">
            <div class="product-image-container fade-in">
                @if($product->img)
                    <img src="{{ asset('/' . $product->img) }}" alt="{{ $product->name }}">
                @else
                    <div class="product-image-placeholder">🍪</div>
                @endif
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
            <div class="product-info fade-in">
                <span class="product-category">{{ ucfirst($product->category) }}</span>
                <h1 class="product-title">{{ $product->name }}</h1>

                @if($product->description)
                    <p class="product-description">{{ $product->description }}</p>
                @endif

                <!-- Price Card -->
                <div class="price-card">
                    <h3 class="price-title">Pilihan Kemasan</h3>

                    @if($product->price_200_gram)
                        <div class="price-option" onclick="selectPackage('200g', {{ $product->price_200_gram }})" data-package="200g" data-price="{{ $product->price_200_gram }}">
                            <span class="price-weight">Kemasan 200 gram</span>
                            <span class="price-amount">Rp {{ number_format($product->price_200_gram, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    @if($product->price_500_gram)
                        <div class="price-option" onclick="selectPackage('500g', {{ $product->price_500_gram }})" data-package="500g" data-price="{{ $product->price_500_gram }}">
                            <span class="price-weight">Kemasan 500 gram</span>
                            <span class="price-amount">Rp {{ number_format($product->price_500_gram, 0, ',', '.') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Quantity Section -->
                <div class="quantity-section">
                    <h3 class="quantity-title">Jumlah Pesanan</h3>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                        <input type="number" id="quantity" class="quantity-input" value="1" min="1" onchange="updateOrderSummary()">
                        <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="order-summary" id="orderSummary" style="display: none;">
                    <h3 class="order-summary-title">Ringkasan Pesanan</h3>
                    <div class="summary-item">
                        <span>Produk:</span>
                        <span id="summaryProduct">{{ $product->name }}</span>
                    </div>
                    <div class="summary-item">
                        <span>Kemasan:</span>
                        <span id="summaryPackage">-</span>
                    </div>
                    <div class="summary-item">
                        <span>Jumlah:</span>
                        <span id="summaryQuantity">1</span>
                    </div>
                    <div class="summary-item">
                        <span>Harga Satuan:</span>
                        <span id="summaryUnitPrice">-</span>
                    </div>
                    <div class="summary-item">
                        <span>Total Harga:</span>
                        <span id="summaryTotal">-</span>
                    </div>
                </div>

                <!-- Order Section -->
                <div class="order-section">
                    <h3 class="order-title">Pesan Sekarang</h3>
                    <p class="text-muted mb-3">Pilih kemasan terlebih dahulu untuk melanjutkan pemesanan</p>

                    <div class="order-buttons">


                        <button class="btn-whatsapp" id="whatsappBtn" onclick="orderViaWhatsApp()" disabled>
                             🛒 Pesan via WhatsApp
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="font-display fw-bold mb-3">Informasi Produk</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <strong>Kategori:</strong> {{ ucfirst($product->category) }}
                                </li>
                                <li class="mb-2">
                                    <strong>Kemasan Tersedia:</strong>
                                    @php
                                        $packages = [];
                                        if($product->price_200_gram) $packages[] = '200g';
                                        if($product->price_500_gram) $packages[] = '500g';
                                    @endphp
                                    {{ implode(', ', $packages) }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <strong>Bahan:</strong> Premium berkualitas tinggi
                                </li>
                                <li class="mb-2">
                                    <strong>Masa Simpan:</strong> 2-3 minggu dalam wadah kedap udara
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related Products -->
@php
    $relatedProducts = \App\Models\Product::where('category', $product->category)
                                         ->where('id', '!=', $product->id)
                                         ->limit(3)
                                         ->get();
@endphp

@if($relatedProducts->count() > 0)
<section class="py-5" style="background: var(--bg-light);">
    <div class="container">
        <h3 class="text-center font-display fw-bold mb-4">Produk Serupa</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $related)
                <div class="col-lg-4 col-md-6">
                    <div class="product-card fade-in">
                        <div class="product-image" style="height: 200px;">
                            @if($related->img)
                                <img src="{{ asset('/' . $related->img) }}" alt="{{ $related->name }}">
                            @else
                                🍪
                            @endif
                        </div>
                        <div class="product-content">
                            <h4 class="product-title">{{ $related->name }}</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="product-price">
                                    @if($related->price_200_gram)
                                        Rp {{ number_format($related->price_200_gram, 0, ',', '.') }}
                                    @elseif($related->price_500_gram)
                                        Rp {{ number_format($related->price_500_gram, 0, ',', '.') }}
                                    @endif
                                </div>
                                <a href="{{ route('product.show', $related->id) }}" class="btn btn-sm btn-outline-primary">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@push('scripts')
<script>
let selectedPackage = null;
let selectedPrice = 0;
let quantity = 1;

// Load saved order from localStorage
function loadSavedOrder() {
    const savedOrder = localStorage.getItem('kukerku_order_{{ $product->id }}');
    if (savedOrder) {
        const order = JSON.parse(savedOrder);
        if (order.package && order.price) {
            selectPackage(order.package, order.price);
            document.getElementById('quantity').value = order.quantity || 1;
            quantity = order.quantity || 1;
        }
    }
}

// Save order to localStorage
function saveOrder() {
    const order = {
        productId: {{ $product->id }},
        productName: '{{ $product->name }}',
        package: selectedPackage,
        price: selectedPrice,
        quantity: quantity,
        total: selectedPrice * quantity
    };
    localStorage.setItem('kukerku_order_{{ $product->id }}', JSON.stringify(order));
}

// Select package function
function selectPackage(packageType, price) {
    // Remove previous selection
    document.querySelectorAll('.price-option').forEach(option => {
        option.classList.remove('selected');
    });

    // Add selection to clicked option
    event.target.closest('.price-option').classList.add('selected');

    selectedPackage = packageType;
    selectedPrice = price;

    // Enable WhatsApp button
    document.getElementById('whatsappBtn').disabled = false;
    document.querySelector('.order-section p').textContent = 'Klik tombol di bawah untuk melanjutkan pemesanan';

    updateOrderSummary();
    saveOrder();
}

// Quantity functions
function increaseQuantity() {
    quantity++;
    document.getElementById('quantity').value = quantity;
    updateOrderSummary();
    saveOrder();
}

function decreaseQuantity() {
    if (quantity > 1) {
        quantity--;
        document.getElementById('quantity').value = quantity;
        updateOrderSummary();
        saveOrder();
    }
}

// Update quantity from input
document.getElementById('quantity').addEventListener('change', function() {
    quantity = parseInt(this.value) || 1;
    if (quantity < 1) {
        quantity = 1;
        this.value = 1;
    }
    updateOrderSummary();
    saveOrder();
});

// Update order summary
function updateOrderSummary() {
    if (selectedPackage && selectedPrice) {
        const total = selectedPrice * quantity;

        document.getElementById('summaryPackage').textContent = selectedPackage;
        document.getElementById('summaryQuantity').textContent = quantity + ' pcs';
        document.getElementById('summaryUnitPrice').textContent = 'Rp ' + selectedPrice.toLocaleString('id-ID');
        document.getElementById('summaryTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('orderSummary').style.display = 'block';
    }
}

// Order via WhatsApp
function orderViaWhatsApp() {
    if (!selectedPackage || !selectedPrice) {
        alert('Silakan pilih kemasan terlebih dahulu');
        return;
    }

    const total = selectedPrice * quantity;
    const orderDate = new Date().toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    // Format pesan seperti struk
    const message = `🛍️ *PESANAN KUKERKU NCIP*
━━━━━━━━━━━━━━━━━━━━━━
📅 Tanggal: ${orderDate}
━━━━━━━━━━━━━━━━━━━━━━

📦 *DETAIL PRODUK:*
• Nama: {{ $product->name }}
• Kategori: {{ ucfirst($product->category) }}
• Kemasan: ${selectedPackage}
• Harga: Rp ${selectedPrice.toLocaleString('id-ID')}
• Jumlah: ${quantity} pcs

━━━━━━━━━━━━━━━━━━━━━━
💰 *TOTAL PEMBAYARAN:*
*Rp ${total.toLocaleString('id-ID')}*
━━━━━━━━━━━━━━━━━━━━━━

Halo! Saya ingin memesan produk di atas. Mohon informasi lebih lanjut untuk proses pemesanan dan pembayaran. Terima kasih! 😊`;

    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://wa.me/6289688037437?text=${encodedMessage}`;

    window.open(whatsappUrl, '_blank');
}

// Load saved order when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadSavedOrder();
});
</script>
@endpush
@endsection
