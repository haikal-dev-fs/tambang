<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-6xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- KIRI: Detail Tambang --}}
            <div class="space-y-4">
                <h1 class="text-3xl font-bold text-gray-800">{{ $tambang->nama_tambang }}</h1>
                <p><span class="font-semibold">📍 Alamat:</span> {{ $tambang->alamat }}</p>
                <p><span class="font-semibold">🧭 Latitude:</span> {{ $tambang->lat }}</p>
                <p><span class="font-semibold">🧭 Longitude:</span> {{ $tambang->long }}</p>
            </div>

            {{-- KANAN: Gambar --}}
            <div class="flex flex-col justify-center">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">🖼️ Gambar Tambang:</h2>
                @if ($tambang->image_path)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach ($tambang->image_path as $image)
                            <div class="w-full h-full overflow-hidden rounded-lg shadow-md">
                                <img src="{{ $image }}" alt="Gambar Tambang"
                                     class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded inline-block">
                        Tidak ada gambar tersedia
                    </div>
                @endif
            </div>
        </div>

        {{-- Tombol kembali --}}
        <div class="mt-8">
            <a href="/tambang" class="inline-block bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 transition">
                ← Kembali
            </a>
        </div>
    </div>
</x-layout>
