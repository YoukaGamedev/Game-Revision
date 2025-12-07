<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>

    <!-- Font Orbitron -->
     <link rel="icon" type="image/png" href="{{ asset('asset/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <style>
        body {
            background: radial-gradient(circle at top, #0f172a, #020617);
            font-family: 'Orbitron', sans-serif;
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* 🌐 Overlay futuristik hologram grid */
        .overlay-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(to right, rgba(0, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            from { background-position: 0 0, 0 0; }
            to { background-position: 60px 60px, 60px 60px; }
        }

        /* 💫 Partikel cahaya */
        .particle {
            position: absolute;
            background: radial-gradient(circle, rgba(0,255,213,0.8), transparent 60%);
            border-radius: 50%;
            animation: float 10s infinite ease-in-out;
            opacity: 0.5;
            z-index: 0;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); opacity: 0.6; }
            50% { transform: translateY(-50px); opacity: 1; }
        }

        /* ✨ Container utama */
        .container {
            text-align: center;
            background: linear-gradient(145deg, rgba(31,41,55,0.95), rgba(15,23,42,0.95));
            border: 2px solid rgba(100, 255, 218, 0.4);
            box-shadow: 0 0 25px rgba(0, 255, 180, 0.25);
            border-radius: 20px;
            padding: 3rem 2rem;
            width: 90%;
            max-width: 700px;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1.2s ease;
            z-index: 2;
        }

        /* 🔥 Border animasi */
        .container::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 2px;
            background: linear-gradient(135deg, #00ffd5, #0077ff, #ff00ff, #00ffd5);
            background-size: 300% 300%;
            animation: rotate 8s linear infinite;
            z-index: 1;
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        @keyframes rotate {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* 🌟 Teks */
        h1 {
            font-size: 2.5rem;
            font-weight: 900;
            color: #00ffe5;
            text-shadow: 0 0 25px #00ffd5;
            margin-bottom: 1rem;
        }

        p {
            color: #cbd5e1;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* 🎮 Tombol */
        .btn {
            display: inline-block;
            padding: 1rem 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 12px;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            cursor: pointer;
            z-index: 3;
            position: relative;
        }

        .btn-start {
            background: linear-gradient(90deg, #00ffd5, #0077ff);
            color: #0f172a;
            box-shadow: 0 0 20px rgba(0,255,213,0.5);
        }

        .btn-start:hover {
            background: linear-gradient(90deg, #00ffe5, #3b82f6);
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(0,255,213,0.8);
        }

        .btn-start:active {
            transform: scale(0.97);
            box-shadow: 0 0 15px rgba(0,255,213,0.4);
        }

        /* ⚙️ Footer */
        .footer {
            position: absolute;
            bottom: 1rem;
            font-size: 0.9rem;
            color: #64748b;
            text-align: center;
            width: 100%;
            z-index: 3;
        }

        .footer span {
            color: #00ffe5;
        }
    </style>
</head>
<body>

    <!-- ✨ Overlay futuristik -->
    <div class="overlay-grid"></div>

    <!-- 💫 Partikel -->
    <div class="particle" style="width:10px; height:10px; top:20%; left:30%; animation-delay:0s;"></div>
    <div class="particle" style="width:14px; height:14px; top:60%; left:70%; animation-delay:2s;"></div>
    <div class="particle" style="width:8px; height:8px; top:40%; left:10%; animation-delay:4s;"></div>
    <div class="particle" style="width:12px; height:12px; top:80%; left:50%; animation-delay:1s;"></div>

    <!-- 🚀 Konten utama -->
    <div class="container">
        <h1>🚀 Selamat Datang di <span class="text-cyan-400">Revision</span></h1>
        <p>Kelola dan pantau seluruh revisi proyek gamemu dengan tampilan futuristik yang memukau dan efisien.</p>

        <a href="{{ route('login') }}" class="btn btn-start">
            Mulai Sekarang →
        </a>
    </div>

    <div class="footer">
        © {{ date('Y') }} <span> Revision </span> • Dibuat dengan 💙 oleh <span>Rizal Abdurahman</span>
    </div>

</body>
</html>
