<x-layout>
    <x-slot:title>Edit User</x-slot:title>

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Data User</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full border-gray-300 rounded px-3 py-2 shadow-sm focus:ring focus:ring-blue-200">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full border-gray-300 rounded px-3 py-2 shadow-sm focus:ring focus:ring-blue-200">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password (Opsional) --}}
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Password Baru <span
                        class="text-sm text-gray-400">(opsional)</span></label>
                <input type="password" name="password"
                    class="w-full border-gray-300 rounded px-3 py-2 shadow-sm focus:ring focus:ring-blue-200"
                    placeholder="Biarkan kosong jika tidak ingin mengubah password">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Role --}}
            @if (auth()->user()->role === 'superadmin')
                {{-- Superadmin bisa ubah role --}}
                <div class="mb-4">
                    <label class="block font-medium text-gray-700 mb-1">Role</label>
                    <select name="role" required
                        class="w-full border-gray-300 rounded px-3 py-2 shadow-sm focus:ring focus:ring-blue-200">
                        <option value="viewer" {{ $user->role === 'viewer' ? 'selected' : '' }}>Viewer</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Superadmin
                        </option>
                    </select>
                    @error('role')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endif



            {{-- Tombol Aksi --}}
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('users.index') }}" class="text-gray-500 hover:underline">← Kembali</a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow-sm transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-layout>
