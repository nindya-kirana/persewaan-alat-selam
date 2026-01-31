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
        }

        .container {
            display: flex;
            height: 100vh;
            width: 100%;
            background: url('/images/lamun2.jpg');
            background-size: cover;
            background-position: center;
        }

        .login-box {
            width: 45%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(167, 243, 208, 0.8), rgba(167, 243, 208, 0.4));
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 8%;
            z-index: 2;
        }

        .logo-box {
            width: 55%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        h2 {
            font-size: 3rem;
            font-weight: 900;
            color: #000;
            margin-bottom: 30px;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a1a1a;
        }

        input {
            width: 100%;
            padding: 12px 25px;
            border-radius: 30px;
            border: none;
            background: white;
            font-size: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            outline: none;
        }

        .btn-mulai {
            margin-top: 20px;
            background: #052c16;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 30px;
            font-size: 1.2rem;
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
            .container { flex-direction: column; }
            .login-box, .logo-box { width: 100%; height: 50%; }
            h2 { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <div class="container">
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
                    <small style="color: #052c16; font-weight: 800; margin-top: 5px; display: block;">
                        * Minimal 8 karakter
                    </small>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required>
                </div>

                @if ($errors->any())
                    <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 10px; margin-bottom: 15px; font-size: 0.8rem;">
                        @foreach ($errors->all() as $error)
                            <p style="margin: 0;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <button type="submit" class="btn-mulai">MULAI</button>
            </form>
        </div>

        <div class="logo-box">
            <img src="/images/logo-seacrest.png" class="logo-white" alt="Logo Seacrest">
        </div>
    </div>
</body>
</html>