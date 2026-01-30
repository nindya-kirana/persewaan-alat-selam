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
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        /* Hero Section - Utama */
        .hero-section {
            background-image: url('/images/lamun-background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 700px;
            position: relative;
            overflow: hidden;
            padding: 30px 50px 60px;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(26, 127, 100, 0.85) 0%, rgba(13, 86, 64, 0.85) 100%);
        }

        /* Navbar Baru - sesuai gambar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 2;
            margin-bottom: 40px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Container kiri: Logo + Search Bar */
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 1;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 60px;
            height: 60px;
            background-color: transparent;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Search Bar di samping logo */
        .search-container {
            flex: 1;
            max-width: 400px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
            background: white;
        }

        .search-input:focus {
            border-color: #1a7f64;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        /* Container kanan: Menu navigasi */
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .cart-icon {
            font-size: 24px;
            cursor: pointer;
            color: #000;
        }

        /* Button Contact Us */
        .contact-button {
            background: #000;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .contact-button:hover {
            background: #333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Link Login */
        .login-link {
            text-decoration: none;
            color: #000;
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s;
        }

        .login-link:hover {
            color: #1a7f64;
        }

        /* Bagian sisanya tetap sama */
        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: flex-start;
            gap: 45px;
            position: relative;
            z-index: 2;
        }

        .hero-text {
            flex: 1;
            color: white;
        }

        .hero-description {
            font-size: 23px;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .hero-title {
            font-size: 53px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .hero-image {
            flex: 1.2;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 0;
            position: relative;
            z-index: 10;
            margin-left: -100px;
        }

        .hero-image img {
            max-width: 120%;
            height: auto;
            filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3));
            border-radius: 20px;
        }

        /* Search Form */
        .search-form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px 60px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            margin-top: 20px;
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 1;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr) auto;
            gap: 20px;
            align-items: end;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            color: #000;
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px 12px 36px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
            background: white;
        }

        .form-input:focus {
            border-color: #1a7f64;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .search-button {
            background: #0d3820;
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .search-button:hover {
            background: #0a2918;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Catalog Section */
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
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
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
        @media (max-width: 1200px) {
            .hero-section {
                padding: 30px 30px 60px;
            }
        }

        @media (max-width: 1024px) {
            .navbar {
                padding: 15px 30px;
            }

            .hero-content {
                flex-direction: column;
                gap: 30px;
            }

            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-button {
                grid-column: 1 / -1;
            }

            .catalog-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            .hero-image {
                margin-left: 0;
                margin-top: 20px;
            }

            .hero-image img {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 20px 20px 50px;
                min-height: auto;
            }

            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 15px 20px;
            }

            .navbar-left {
                width: 100%;
                justify-content: space-between;
            }

            .search-container {
                max-width: 60%;
            }

            .navbar-right {
                width: 100%;
                justify-content: space-between;
            }

            .hero-title {
                font-size: 32px;
            }

            .hero-description {
                font-size: 18px;
            }

            .search-form-container {
                padding: 30px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .catalog-section {
                padding: 0 20px;
            }

            .catalog-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .navbar-left {
                flex-direction: column;
                gap: 15px;
            }

            .search-container {
                max-width: 100%;
                width: 100%;
            }

            .navbar-right {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                gap: 15px;
                justify-content: center;
            }

            .hero-title {
                font-size: 28px;
            }

            .hero-description {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section dengan Navbar di dalamnya -->
    <section class="hero-section">
        <!-- Navbar Baru sesuai gambar -->
        <nav class="navbar">
            <div class="navbar-left">
                <div class="logo-container">
                    <div class="logo">
                        <img src="/images/logo-seacrest.png" alt="Seacrest Logo">
                    </div>
                </div>
                
                <div class="search-container">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" class="search-input" placeholder="Cari Alat">
                </div>
            </div>

            <div class="navbar-right">
                <span class="cart-icon">🛒</span>
                
                <div class="nav-menu">
                    <a href="#" class="contact-button">CONTACT US</a>
                    <a href="#" class="login-link">LOGIN</a>
                </div>
            </div>
        </nav>

        <!-- Konten Hero -->
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">SEWA ALAT SELAM<br>SEACREST INDONESIA</h1>
                <p class="hero-description">
                    Penyewaan alat selam dan riset kelautan di Seacrest kini jadi lebih mudah, praktis, dan mendukung 
                    penuh kebutuhan eksplorasi bawah air Anda.
                </p>

                <!-- Search Form -->
                <div class="search-form-container">
                    <form action="#" method="GET">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Tanggal Mulai Sewa</label>
                                <div class="input-wrapper">
                                    <input type="date" name="tanggal_mulai" class="form-input" id="tanggal_mulai" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Waktu Mulai</label>
                                <div class="input-wrapper">
                                    <input type="time" name="waktu_mulai" class="form-input" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tanggal Selesai</label>
                                <div class="input-wrapper">
                                    <input type="date" name="tanggal_selesai" class="form-input" id="tanggal_selesai" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Waktu Selesai</label>
                                <div class="input-wrapper">
                                    <input type="time" name="waktu_selesai" class="form-input" required>
                                </div>
                            </div>

                            <button type="submit" class="search-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.35-4.35"></path>
                                </svg>
                                Cari Alat
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="hero-image">
                <img src="/images/dugong.jpg" alt="Dugong">
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section class="catalog-section">
        <h2 class="catalog-title">Our Catalog</h2>
        <div class="catalog-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400" alt="BCD">
                </div>
                <div class="product-info">
                    <h3 class="product-name">BCD</h3>
                    <p class="product-price">Rp 75.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400" alt="Belt">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Belt</h3>
                    <p class="product-price">Rp 20.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1582967788606-a171c1080cb0?w=400" alt="Bola Duga">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Bola Duga</h3>
                    <p class="product-price">Rp 20.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=400" alt="Botol Sampel">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Botol Sampel</h3>
                    <p class="product-price">Rp 10.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400" alt="Booties">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Booties</h3>
                    <p class="product-price">Rp 75.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400" alt="Slate">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Slate</h3>
                    <p class="product-price">Rp 75.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400" alt="Regulator ScubaPro">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Regulator ScubaPro</h3>
                    <p class="product-price">Rp 75.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400" alt="BCD Pro">
                </div>
                <div class="product-info">
                    <h3 class="product-name">BCD</h3>
                    <p class="product-price">Rp 75.000 <span class="price-period">/Hari</span></p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Set minimum date untuk tanggal mulai dan selesai ke hari ini
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_mulai').setAttribute('min', today);
        document.getElementById('tanggal_selesai').setAttribute('min', today);

        // Update minimum tanggal selesai ketika tanggal mulai dipilih
        document.getElementById('tanggal_mulai').addEventListener('change', function() {
            const tanggalMulai = this.value;
            document.getElementById('tanggal_selesai').setAttribute('min', tanggalMulai);
            
            // Jika tanggal selesai sudah terisi dan lebih kecil dari tanggal mulai, reset
            const tanggalSelesai = document.getElementById('tanggal_selesai').value;
            if (tanggalSelesai && tanggalSelesai < tanggalMulai) {
                document.getElementById('tanggal_selesai').value = '';
            }
        });
    </script>
</body>
</html>