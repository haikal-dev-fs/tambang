<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg relative">

        <h3 class="text-2xl font-semibold mb-4">{{ $tambang->nama_tambang }}</h3>
        <p><strong>Alamat:</strong> {{ $tambang->alamat }}</p>
        <p><strong>Latitude:</strong> {{ $tambang->lat }}</p>
        <p><strong>Longitude:</strong> {{ $tambang->long }}</p>
        <img src="{{ asset('storage/' . $tambang['images']) }}" alt="{{ $tambang->images }}"
            class="w-full h-auto mt-4 rounded-lg shadow-sm">
    </div>

    <div class="max-w-4xl mx-auto mt-6 flex justify-start space-x-2">
            <a href="/tambang"
                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">Kembali</a>
        </div>
</x-layout>
