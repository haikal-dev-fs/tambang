<x-layout>
    <x-slot:title>Manajemen Users</x-slot:title>

    <div class="max-w-6xl mx-auto px-4 py-8">
        {{-- message --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel --}}
        <div class="overflow-x-auto rounded-lg shadow border border-gray-200 bg-white">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-600 text-left">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Nama</th>
                        <th class="px-6 py-3 font-semibold">Email</th>
                        <th class="px-6 py-3 font-semibold">Role</th>
                        @if (in_array(auth()->user()->role, ['admin', 'superadmin']))
                            <th class="px-4 py-3">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $user->role }}</td>
                            @if (in_array(auth()->user()->role, ['admin', 'superadmin']))
                                <td class="px-4 py-2 space-x-2">
                                    @if (auth()->user()->role === 'superadmin' || $user->role !== 'superadmin')
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-blue-600 hover:underline">Edit</a>
                                    @endif
                                    {{-- Superadmin bisa hapus user selain dirinya --}}
                                    @if (auth()->user()->role === 'superadmin' && auth()->id() !== $user->id)
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                            class="inline-block"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            @endif


                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500 italic">
                                Tidak ada data pengguna.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Tombol Tambah User --}}
        @if (auth()->user()->role === 'superadmin')
            <div class="mb-4 mt-3">
                <a href="{{ route('users.create') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm font-medium transition">
                    + Tambah User
                </a>
            </div>
        @endif

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-layout>
    