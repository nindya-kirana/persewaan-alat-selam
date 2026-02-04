<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - Seacrest Indonesia</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        body { background-color: #ffffff; }

        .navbar { display: flex; align-items: center; justify-content: space-between; padding: 15px 50px; background: white; }
        .navbar-left .logo img { height: 50px; }
        .navbar-right { display: flex; align-items: center; gap: 25px; }
        .contact-button { background: black; color: white; padding: 10px 25px; border-radius: 25px; text-decoration: none; font-weight: 800; font-size: 14px; }

        .search-header {
            background: #052c16;
            color: white;
            padding: 40px 50px;
            margin-bottom: 40px;
        }

        .container { max-width: 1400px; margin: 0 auto; padding: 0 20px; }

        .catalog-section { max-width: 1400px; margin: 40px auto; padding: 0 50px; }
        .catalog-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; }

        /* Mencegah garis bawah pada link produk */
        .product-link { text-decoration: none; color: inherit; display: block; }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }

        .product-image {
            width: 100%; height: 250px; background-color: #f0f0f0;
            display: flex; align-items: center; justify-content: center; overflow: hidden;
        }

        .product-image img { width: 100%; height: 100%; object-fit: cover; }
        .product-info { padding: 20px; }
        .product-name { font-size: 20px; font-weight: 700; color: #000; margin-bottom: 10px; text-decoration: none !important; }
        .product-price { font-size: 22px; font-weight: 700; color: #1a7f64; }
        .price-period { font-size: 14px; font-weight: 400; color: #666; }

        .empty-state {
            grid-column: 1 / -1;
            padding: 80px 20px;
            text-align: center;
            background: #f8fafc;
            border-radius: 20px;
            border: 2px dashed #cbd5e1;
        }

        @media (max-width: 1024px) { .catalog-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px) { .catalog-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a href="/" class="logo"><img src="/images/logo-seacrest.png" alt="Seacrest Logo"></a>
        </div>
        <div class="navbar-right">
            <a href="{{ route('home') }}" style="text-decoration: none; color: black; font-weight: 700;">KEMBALI KE HOME</a>
            <a href="#" class="contact-button">CONTACT US</a>
        </div>
    </nav>

    <header class="search-header">
        <div class="container">
            <h1>Alat Tersedia</h1>
            <p style="opacity: 0.8; margin-top: 10px;">
                Periode: <strong>{{ date('d M Y', strtotime($start)) }}</strong> s/d <strong>{{ date('d M Y', strtotime($end)) }}</strong>
            </p>
        </div>
    </header>

    <section class="catalog-section">
        <div class="catalog-grid">
            @forelse($products as $product)
                {{-- Link Produk Tanpa Garis Bawah --}}
                <a href="{{ route('product.detail', ['id' => $product->id, 'start' => $start, 'end' => $end]) }}" class="product-link">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('storage/' . (Str::contains($product->image, 'products/') ? $product->image : 'products/'.$product->image)) }}" 
                                 alt="{{ $product->nama_alat }}"
                                 onerror="this.src='https://placehold.co/400x400?text=No+Image'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">{{ $product->nama_alat }}</h3>
                            <p class="product-price">
                                Rp {{ number_format($product->variants->min('harga_per_hari'), 0, ',', '.') }} 
                                <span class="price-period">/hari</span>
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="empty-state">
                    <h2 style="color: #64748b;">Yah, Stok Habis!</h2>
                    <p style="color: #94a3b8; margin-top: 10px;">Tidak ada alat yang tersedia untuk tanggal yang kamu pilih.</p>
                    <a href="{{ route('home') }}" style="display: inline-block; margin-top: 20px; color: #1a7f64; font-weight: 700; text-decoration: none;">Coba cari tanggal lain</a>
                </div>
            @endforelse
        </div>
    </section>

</body>
</html>