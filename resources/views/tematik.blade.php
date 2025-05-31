<x-layout>

    <div id="map"></div>

    <script>
        var map = L.map('map').setView([-8.3513778, 115.0528291, 9], 9);

        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
</x-layout>
