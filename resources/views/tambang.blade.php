<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    <div class="overflow-x-auto p-4">
        <table class="min-w-full table-auto border border-gray-300 rounded-lg shadow-md">
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
                        <td class="px-4 py-2 border-b">{{ $tambang['nama_tambang']}}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['alamat'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['lat'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['long'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $tambang['images'] }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="/detail/{{ $tambang->kode_tambang }}"
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">View</a>
                            <a
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Edit</a>
                            <a
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>

</x-layout>
