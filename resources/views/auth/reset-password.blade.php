<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4">Reset Password</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.reset.manual') }}" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email" required class="w-full border px-4 py-2 rounded">
            <input type="password" name="password" placeholder="Password Baru" required
                class="w-full border px-4 py-2 rounded">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required
                class="w-full border px-4 py-2 rounded">
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Reset
                Password</button>
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:underline">
                    Kembali ke halaman login
                </a>
            </div>

        </form>
    </div>
</body>

</html>
