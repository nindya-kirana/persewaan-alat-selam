<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Seacrest Indonesia</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        body, html {
            height: 100%;
            overflow: hidden;
            background-color: #f0f2f5;
        }

        .page-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100%;
            padding: 150px; /* Ini padding putih di sekelilingnya */
            background: #e3ffea;
        }

        .main-card { /* Container utama dengan background gambar dan sudut melengkung */
            display: flex;
            height: 140%;
            width: 60%;
            background: url('/images/lamun2.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .login-box {
            width: 50%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(111, 196, 245, 0.64), rgba(146, 245, 199, 0.64));
            backdrop-filter: blur(3px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 5%;
            z-index: 2;
        }

        .logo-box {
            width: 55%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h2 {
            font-size: 26px;
            font-weight: 900;
            color: #000;
            margin-bottom: 20px;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 12px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
        }

        input {
            width: 93%;
            padding: 12px 25px;
            border-radius: 35px;
            border: 0;
            background: white;
            font-size: 0.95rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            outline: none;
            display: block;
        }

        .btn-mulai {
            margin-top: 10px;
            background: #052c16;
            color: white;
            border: none;
            padding: 12px;
            width: 93%;
            border-radius: 35px;
            font-size: 18px;
            font-weight: 800;
            cursor: pointer;
            letter-spacing: 2px;
            transition: 0.3s;
            text-transform: uppercase;
        }

        .btn-mulai:hover {
            background: #0d4a2d;
            transform: translateY(-2px);
        }

        .logo-white {
            width: 60%;
            max-width: 450px;
            filter: drop-shadow(0 0 10px rgba(0,0,0,0.1));
        }

        @media (max-width: 768px) {
            .page-wrapper { padding: 15px; }
            .main-card { flex-direction: column; }
            .login-box, .logo-box { width: 100%; height: 50%; padding: 25px; }
            h2 { font-size: 1.8rem; }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="main-card">
            <div class="login-box">
                <h2>REGISTRASI</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required>
                    </div>

                    @if ($errors->any())
                        <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 10px; margin-bottom: 10px; font-size: 0.75rem; font-weight: 600;">
                            @foreach ($errors->all() as $error)
                                <p style="margin: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <button type="submit" class="btn-mulai">MULAI</button>
                </form>
            </div>

            <div class="logo-box">
                <img src="/images/logoputih.png" class="logo-white" alt="Logo Seacrest">
            </div>
        </div>
    </div>
</body>
</html>