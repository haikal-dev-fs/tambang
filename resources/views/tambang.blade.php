<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-7xl mx-auto px-4 py-6">
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nama Tambang</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Alamat</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Lat</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Long</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Images</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100 text-sm text-gray-800">
                    @foreach ($tambangs as $tambang)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $tambang['nama_tambang'] }}</td>
                            <td class="px-6 py-4">{{ $tambang['alamat'] }}</td>
                            <td class="px-6 py-4">{{ $tambang['lat'] }}</td>
                            <td class="px-6 py-4">{{ $tambang['long'] }}</td>
                            <td class="px-6 py-4 flex flex-wrap gap-2">
                                @if ($tambang->image_path)
                                    @foreach ($tambang->image_path as $image)
                                        <img src="{{ $image }}" class="w-20 h-16 object-cover rounded shadow-sm border border-gray-200">
                                    @endforeach
                                @else
                                    <span class="text-gray-400 italic">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="/detail/{{ $tambang->kode_tambang }}"
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm">View</a>
                                    <a href="{{ route('tambang.edit', $tambang->kode_tambang) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm">Edit</a>
                                    <form action="{{ route('tambang.destroy', $tambang->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="/tambang_create"
                class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-2 rounded-md shadow-sm text-sm">
                + Tambah Data
            </a>
        </div>
    </div>
</x-layout>
