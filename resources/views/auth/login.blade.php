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
            /* Background utama di body agar frame putih terlihat kontras */
            background-color: #f0f2f5; 
        }

        /* Container sekarang berfungsi sebagai area padding/frame luar */
        .page-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100%;
            padding: 150px; /* Ini padding putih di sekelilingnya */
            background: #e3ffea; 
        }

        /* Container utama dengan background gambar dan sudut melengkung */
        .main-card {
            display: flex;
            height: 130%;
            width: 60%;
            background: url('/images/lamun2.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 10px; /* Sudut melengkung halus */
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .login-box {
            width: 50%; //bagian logo
            height: 180%;
            background: linear-gradient(to bottom, rgba(111, 196, 245, 0.64), rgba(146, 245, 199, 0.64));
            backdrop-filter: blur(3px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 5%; //bagian login
            z-index: 2;
        }

        .logo-box {
            width: 55%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h2 { // tulisan login
            font-size: 26px;
            font-weight: 900;
            color: #000;
            margin-bottom: 5px;
            letter-spacing: 5px;
            text-transform: uppercase;
            text-align: center;
            width: 100%;
        }

        .sub-text { //tulisan pengguna baru registrasi
            font-size: 16px;
            margin-bottom: 30px;
            font-weight: 500;
            color: #1a1a1a;
            text-align: center;
            width: 100%;
        }

        .green-link {
            color: #1a7f64;
            text-decoration: none;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label { // tulisan email dan password
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
        }

        input {
            width: 93%;
            padding: 12px 25px;
            border-radius: 35px; //lebar atas bawah
            border: 0;
            outline: none;
            background: white;
            font-size: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
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
            transform: scale(1.02);
        }

        .logo-white {
            width: 60%;
            max-width: 450px;
            filter: drop-shadow(0 0 15px rgba(0,0,0,0.1));
        }

        .error-msg {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .page-wrapper { padding: 15px; }
            .main-card { flex-direction: column; }
            .login-box, .logo-box { width: 100%; height: 50%; padding: 30px; }
            h2 { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="main-card">
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
                <img src="/images/logoputih.png" class="logo-white" alt="Logo Seacrest Indonesia">
            </div>
        </div>
    </div>
</body>
</html>