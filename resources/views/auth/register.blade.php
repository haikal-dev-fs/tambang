<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <style>
        .left-panel {
            background: linear-gradient(to bottom right, #38a169, #2f855a);
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100%;
            /* Tambahkan ini */
        }

        @media (min-width: 768px) {
            .left-panel {
                width: 50%;
            }
        }


        .left-panel h2 {
            font-size: 1.875rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .left-panel p {
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            text-align: center;
            max-width: 300px;
        }

        .login-btn {
            border: 1px solid white;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: white;
            color: #2f855a;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
    <div class="flex items-center justify-center min-h-[80vh] px-4">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg flex overflow-hidden">

            <!-- Kiri: Ajakan Login -->
            <div class="left-panel">
                <h2>Selamat Datang!</h2>
                <p>Silakan login jika sudah memiliki akun</p>
                <a href="{{ route('login') }}" class="login-btn">SIGN IN</a>
            </div>

            <!-- Kanan: Form Register -->
            <div class="w-1/2 p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Akun</h2>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="name" required placeholder="Nama Lengkap"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-green-300">
                    <input type="email" name="email" required placeholder="Email"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-green-300">
                    <input type="password" name="password" required placeholder="Password"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-green-300">
                    <input type="password" name="password_confirmation" required placeholder="Konfirmasi Password"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-green-300">

                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition">
                        REGISTER
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
