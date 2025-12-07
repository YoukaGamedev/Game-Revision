<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi background gradient */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            background: linear-gradient(-45deg, #4f46e5, #7c3aed, #312e81, #1e1b4b);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        /* Efek glow pada box login */
        .login-box {
            box-shadow: 0 0 25px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease;
        }
        .login-box:hover {
            box-shadow: 0 0 40px rgba(139, 92, 246, 0.5);
            transform: scale(1.02);
        }

        /* Efek input fokus */
        input:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.7);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="login-box bg-gray-800/90 p-8 rounded-2xl w-96 text-white backdrop-blur-md">
        <h2 class="text-3xl font-bold mb-6 text-center text-indigo-400 drop-shadow-lg">🔐 Login Admin</h2>

        @if($errors->any())
            <div class="bg-red-500/30 border border-red-400 text-red-300 p-3 rounded mb-4 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-2 text-sm text-gray-300">Email</label>
                <input type="email" name="email"
                    class="w-full px-3 py-2 bg-gray-700/70 rounded focus:ring-2 focus:ring-indigo-500 transition" required>
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-300">Password</label>
                <input type="password" name="password"
                    class="w-full px-3 py-2 bg-gray-700/70 rounded focus:ring-2 focus:ring-indigo-500 transition" required>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 py-2 rounded font-semibold hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/40 transition">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>
