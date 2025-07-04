<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <style>
        .right-panel {
            background: linear-gradient(to bottom right, #38a169, #2f855a);
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        @media (min-width: 768px) {
            .right-panel {
                width: 50%;
            }
        }

        .right-panel h2 {
            font-size: 1.875rem;
            /* text-3xl */
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .right-panel p {
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            text-align: center;
            max-width: 300px;
        }

        .signup-btn {
            border: 1px solid white;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .signup-btn:hover {
            background: white;
            color: #2f855a;
        }
    </style>

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">

    <div class="flex items-center justify-center min-h-[80vh] px-4">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg flex overflow-hidden">

            <!-- Kiri: Form Login -->
            <div class="w-1/2 p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Sign in</h2>

                @if ($errors->any())
                    <div class="mb-4 text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="email" name="email" required placeholder="Email"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-green-300">
                    <input type="password" name="password" required placeholder="Password"
                        class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-green-300">

                    <div class="text-sm text-right mb-2">
                        <a href="{{ route('password.reset.form') }}" class="text-gray-500 hover:underline">
                            Lupa kata sandi anda?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition">
                        SIGN IN
                    </button>
                </form>
            </div>

            <!-- Kanan: Sign Up Ajak -->
            <div class="right-panel">
                <h2>Halo, Teman!</h2>
                <p>Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
                <a href="{{ route('register') }}" class="signup-btn">SIGN UP</a>
            </div>

        </div>
    </div>
</body>

</html>
