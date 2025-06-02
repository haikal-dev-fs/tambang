<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <section class="text-center py-20 from-blue-50 to-white">
        <h2 class="text-4xl font-bold mb-4">Selamat Datang di Website Tambang</h2>
        <p class="text-gray-600 mb-6">Solusi terbaik untuk kebutuhan Tambang Anda.</p>
        <a href="#kontak" class="px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">Hubungi
            Kami</a>
    </section>

    <div id="map"></div>

    <script>
        var map = L.map('map').setView([-6.3505808, 106.957789], 17);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([-6.3505808, 106.957789]).addTo(map);
    </script>
</x-layout>
