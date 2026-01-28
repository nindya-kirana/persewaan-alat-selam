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
        }

        .hero-section {
            background-image: url('/images/lamun-background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgb(70, 150, 103) 0%, rgba(9, 86, 47, 0.75) 5%);
        }

        .header { //logo dan judul situs
            position: relative;
            z-index: 10;
            padding: 20px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 90px;
            height: 90px;
            background-color: transparent;
            border-radius: 50%;
            padding: 5px;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .site-title {
            color: white;
            font-size: 37px;
            font-weight: 600;
        }

        .content {
            position: relative;
            z-index: 10;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
            //max-width: 1600px;
            margin: 0 auto;
            width: 100%;
        }

        .main-title { //judul utama
            color: #ffffff;
            font-size: 48px;
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 30px;
            letter-spacing: -0.5px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            
        }

        .description { //deskripsi di bawah judul utama
            color: #ffffff;
            font-size: 20px;
            color: #ffffff;
            line-height: 1.7;
            max-width: 1200px;
            margin-bottom: 50px;
            font-weight: 400;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-card {
            background: white;
            border-radius: 20px;
            padding: 40px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 101%;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr) auto;
            gap: 20px;
            align-items: end;
            max-width: 1400px;
            margin: 0 auto;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            color: #002d12;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 14px 15px 14px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #002d12;
            box-shadow: 0 0 0 3px rgba(13, 85, 102, 0.1);
        }

        .search-button {
            background: #002d12;
            color: white;
            border: none;
            padding: 14px 40px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .search-button:hover {
            background: #094454;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 85, 102, 0.3);
        }

        @media (max-width: 1024px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-button {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 20px 30px;
            }

            .content {
                padding: 30px;
            }

            .main-title {
                font-size: 36px;
            }

            .description {
                font-size: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .search-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="header">
            <div class="logo">
                <img src="/images/logo-seacrest.png" alt="Seacrest Logo">
            </div>
            <h1 class="site-title">Seacrest Indonesia</h1>
        </div>

        <div class="content">
            <h2 class="main-title">Sewa Alat Selam Seacrest</h2>
            <p class="description">
                Penyewaan alat selam dan riset kelautan di Seacrest kini jadi lebih mudah, praktis, dan mendukung 
                penuh kebutuhan eksplorasi bawah air Anda. Kami menyediakan berbagai pilihan alat selam berkualitas,
                mulai dari perlengkapan standar hingga peralatan elektronik mutakhir untuk menunjang aktivitas 
                profesional maupun penelitian.
            </p>

            <div class="search-card">
                <form action="{{ route('rental.search') }}" method="GET">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Tanggal Mulai Sewa</label>
                            <div class="input-wrapper">

                                <input type="date" name="tanggal_mulai" class="form-input" id="tanggal_mulai" min="{{ date('Y-m-d') }}" required>
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

                                <input type="date" name="tanggal_selesai" class="form-input" id="tanggal_selesai" min="{{ date('Y-m-d') }}" required>
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
    </div>
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