<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Seacrest Indonesia</title>
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

        /* Sisi Kiri: Box Form Login */
        .login-box {
            width: 45%;
            height: 100%;
            /* Overlay hijau transparan sesuai contoh (Statistik Dadboard (6).jpg) */
            background: linear-gradient(to bottom, rgba(167, 243, 208, 0.8), rgba(167, 243, 208, 0.4));
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 8%;
            z-index: 2;
        }

        /* Sisi Kanan: Logo */
        .logo-box {
            width: 55%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h2 {
            font-size: 3.5rem;
            font-weight: 900;
            color: #000;
            margin-bottom: 5px;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        .sub-text {
            font-size: 1.2rem;
            margin-bottom: 40px;
            font-weight: 500;
            color: #1a1a1a;
        }

        .green-link {
            color: #1a7f64;
            text-decoration: none;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2rem;
            font-weight: 600;
            color: #1a1a1a;
        }

        input {
            width: 100%;
            padding: 15px 25px;
            border-radius: 35px;
            border: none;
            background: white;
            font-size: 1.1rem;
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
            border-radius: 35px;
            font-size: 1.3rem;
            font-weight: 800;
            cursor: pointer;
            letter-spacing: 2px;
            transition: 0.3s;
            text-transform: uppercase;
        }

        .btn-mulai:hover {
            background: #0d4a2d;
            transform: scale(1.02);
        }

        .logo-white {
            width: 65%;
            max-width: 500px;
            filter: drop-shadow(0 0 15px rgba(0,0,0,0.1));
        }

        /* Alert Error */
        .error-msg {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .container { flex-direction: column; }
            .login-box, .logo-box { width: 100%; height: 50%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>LOGIN</h2>
            <p class="sub-text">Pengguna baru? <a href="{{ route('register') }}" class="green-link">Registrasi segera!</a></p>

            @if($errors->any())
                <div class="error-msg">
                    Email atau password yang Anda masukkan salah.
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn-mulai">MULAI</button>
            </form>
        </div>

        <div class="logo-box">
            <img src="/images/logo-seacrest.png" class="logo-white" alt="Logo Seacrest Indonesia">
        </div>
    </div>
</body>
</html>