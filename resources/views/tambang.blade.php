<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    <div class="overflow-x-auto p-4">
        @if (session('success'))
            <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full mb-4 table-auto border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left border-b">Nama Tambang</th>
                    <th class="px-4 py-2 text-left border-b">Alamat</th>
                    <th class="px-4 py-2 text-left border-b">Lat</th>
                    <th class="px-4 py-2 text-left border-b">Long</th>
                    <th class="px-4 py-2 text-left border-b">Images</th>
                    <th class="px-4 py-2 text-left border-b">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($tambangs as $tambang)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $tambang['nama_tambang'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['alamat'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['lat'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['long'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['images'] }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="/detail/{{ $tambang->kode_tambang }}"
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">View</a>
                            <a href="{{ route('tambang.edit', $tambang->kode_tambang) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Edit</a>
                                <form action="{{ route('tambang.destroy', $tambang->id) }}" method="POST"
                                    style="display:inline-block"
                                    onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/tambang_create" class="bg-green-500 text-white px-3 py-3 rounded hover:bg-green-600 text-sm">Tambah
            Data</a>
    </div>

</x-layout>
