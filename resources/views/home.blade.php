<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seacrest Indonesia - Sewa Alat Selam</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #ffffff;
        }

        /* --- NAVBAR --- */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 50px;
            background: white;
        }

        .navbar-left .logo img {
            height: 50px;
        }

        .navbar-center {
            flex: 1;
            max-width: 500px;
            margin: 0 40px;
        }

        .search-container {
            position: relative;
            width: 100%;
        }

        .search-input {
            width: 100%;
            padding: 10px 20px 10px 45px; /* Spasi kiri ditambah untuk ikon */
            border: 2px solid #000;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
        }

        /* Ikon Search di Navbar */
        .search-icon-svg {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #666;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        /* Ikon Keranjang */
        .cart-icon-svg {
            width: 24px;
            height: 24px;
            cursor: pointer;
            color: #000;
            transition: 0.3s;
        }
        
        .cart-icon-svg:hover { color: #1a7f64; }

        .login-link {
            text-decoration: none;
            color: black;
            font-weight: 800;
            font-size: 14px;
        }

        .contact-button {
            background: black;
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 800;
            font-size: 14px;
        }

        /* --- HERO SECTION --- */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero-banner {
            background: linear-gradient(135deg, rgba(13, 86, 64, 0.65) 0%, rgba(26, 127, 100, 0.65) 100%), 
                        url('/images/lamun-background.jpg'); 
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            min-height: 450px;
            position: relative;
            padding: 60px 80px;
            color: white;
            overflow: visible; 
            margin-bottom: 50px;
        }

        .hero-text {
            max-width: 600px;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .hero-description {
            font-size: 18px;
            line-height: 1.5;
            opacity: 0.9;
        }

        /* --- DUGONG OVERLAP --- */
        .dugong-image {
            position: absolute;
            right: 20px;
            top: -40px; 
            width: 450px;
            z-index: 10;
        }

        .dugong-image img {
            width: 100%;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
        }

        /* --- FLOATING SEARCH FORM --- */
        .search-form-wrapper {
            position: absolute;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 95%;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            z-index: 5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr) 200px;
            gap: 15px;
            align-items: flex-end;
        }

        .form-group label {
            display: block;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 8px;
            color: #333;
        }

        .input-with-icon {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 8px 12px;
            gap: 10px;
        }

        .form-icon-svg {
            width: 18px;
            height: 18px;
            color: #666;
        }

        .input-with-icon input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px;
        }

        .btn-search {
            background: #052c16;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .btn-search:hover { background: #0d4a2d; }

        /* --- CATALOG --- */
        .catalog-section {
            max-width: 1400px;
            margin: 60px auto;
            padding: 0 50px;
        }

        .catalog-title {
            font-size: 40px;
            font-weight: 700;
            color: #000;
            margin-bottom: 30px;
            text-align: center;
        }

        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 250px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            padding: 20px;
        }

        .product-name {
            font-size: 22px;
            font-weight: 700;
            color: #000;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 24px;
            font-weight: 700;
            color: #1a7f64;
        }

        .price-period {
            font-size: 16px;
            font-weight: 400;
            color: #666;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .form-grid { grid-template-columns: 1fr 1fr; }
            .dugong-image { width: 300px; top: 0; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a href="/" class="logo"><img src="/images/logo-seacrest.png" alt="Seacrest Logo"></a>
        </div>
        <div class="navbar-center">
            <div class="search-container">
                <svg class="search-icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" class="search-input" placeholder="Cari Alat">
            </div>
        </div>
            <div class="navbar-right">
        <svg class="cart-icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>

        @guest
            <a href="{{ route('login') }}" class="login-link">LOGIN</a>
        @else
            <span style="font-weight: 800; font-size: 14px;">HI, {{ strtoupper(Auth::user()->name) }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="login-link" style="background:none; border:none; cursor:pointer; padding:0; margin-left:15px; font-family:inherit; font-size:14px; font-weight:800; color: #b91c1c;">
                    LOGOUT
                </button>
            </form>
        @endguest
        
        <a href="#" class="contact-button">CONTACT US</a>
    </div>
        
    </nav>

    <div class="container">
        <section class="hero-banner">
            <div class="hero-text">
                <h1 class="hero-title">SEWA ALAT SELAM<br>SEACREST INDONESIA</h1>
                <p class="hero-description">
                    Ingin mengumpulkan data terkait kelautan tetapi memiliki keterbatasan alat? Kami punya solusinya untuk Anda!
                </p>
            </div>

            <div class="dugong-image">
                <img src="/images/dugong.jpg" alt="Dugong">
            </div>

            <div class="search-form-wrapper">
                <form action="{{ route('rental.search') }}" method="GET">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <div class="input-with-icon">
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Waktu Mulai</label>
                            <div class="input-with-icon">
                                <input type="time" name="waktu_mulai" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <div class="input-with-icon">
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Waktu Selesai</label>
                            <div class="input-with-icon">
                                <input type="time" name="waktu_selesai" required>
                            </div>
                        </div>
                        <button type="submit" class="btn-search">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            Cari Alat
                        </button>
                    </div>
                </form>
            </div>
        </section>


        <section class="catalog-section">
            <h2 class="catalog-title">Our Best Gears</h2>
            <div class="catalog-grid">
                @forelse($products as $product)
                    <a href="{{ route('product.detail', $product->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('storage/' . (Str::contains($product->image, 'products/') ? $product->image : 'products/'.$product->image)) }}" 
                                    alt="{{ $product->nama_alat }}"
                                    onerror="this.src='https://placehold.co/400x400?text=No+Image'">
                            </div>
                            <div class="product-info">
                                <h3 class="product-name">{{ $product->nama_alat }}</h3>
                                <p class="product-price">
                                    {{-- Mengambil harga terendah dari varian yang ada --}}
                                    Rp {{ number_format($product->variants->min('harga_per_hari'), 0, ',', '.') }} 
                                    <span class="price-period">/hari</span>
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div style="grid-column: 1 / -1; padding: 80px; text-align: center; background: #fff; border-radius: 20px; border: 2px dashed #e2e8f0;">
                        <p style="color: #94a3b8; font-weight: 500;">Maaf, belum ada produk tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </section>

    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_mulai').setAttribute('min', today);
        document.getElementById('tanggal_selesai').setAttribute('min', today);

        document.getElementById('tanggal_mulai').addEventListener('change', function() {
            const tanggalMulai = this.value;
            document.getElementById('tanggal_selesai').setAttribute('min', tanggalMulai);
        });
    </script>
</body>
</html>