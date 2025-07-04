<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Hero Section --}}
    <section class="bg-gradient-to-b from-blue-100 to-white text-center py-20">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-4 leading-tight">
                Selamat Datang di Website Tambang
            </h2>
            <p class="text-lg text-gray-600 mb-6">
                Solusi terbaik untuk pencatatan lokasi tambang Anda secara mudah dan terorganisir.
            </p>
            <a href="/tambang"
                class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow-md transition">
                ✏️ Catat Sekarang
            </a>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="px-4 py-12">
        <div class="max-w-8xl mx-auto">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Peta Lokasi Tambang</h3>
            <div class="rounded-lg overflow-hidden border border-gray-300 shadow">
                <div id="map" class="w-full h-[500px]"></div>
            </div>
        </div>
    </section>

    {{-- Leaflet Map Script --}}
    <script>
        var map = L.map('map').setView([0.035912, 119.935714], 4.5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var tambangs = @json($tambangs);

        tambangs.forEach(function(tambang) {
            if (tambang.lat && tambang.long) {
                L.marker([parseFloat(tambang.lat), parseFloat(tambang.long)])
                    .addTo(map)
                    .bindPopup(`
                        <div class="font-semibold text-blue-800 mb-1">${tambang.nama_tambang}</div>
                        <div class="text-sm text-gray-600">${tambang.alamat}</div>
                        <div class="text-xs text-gray-400 mt-1">Koordinat: ${tambang.lat}, ${tambang.long}</div>
                    `);
            }
        });
    </script>
</x-layout>
