<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kejadian</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
            margin-bottom: 20px;
        }

        .map-buttons {
            margin-bottom: 20px;
        }

        .map-buttons button {
            padding: 10px 15px;
            margin-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Daftar Kejadian</h1>

    <!-- Tombol untuk memilih jenis tampilan -->
    <div class="map-buttons">
        <button onclick="showMarkers()">Tampilkan Titik</button>
        <button onclick="showChoropleth()">Tampilkan Choropleth Map</button>
    </div>

    <div id="map"></div>

    <a href="{{ route('incidents.create') }}">Tambah Kejadian</a>

    <ul>
        @foreach ($incidents as $incident)
            <li> sjhdfkjsdhf
                <strong>{{ $incident->location_name }}</strong> ({{ $incident->region_name }})
                <br>Koordinat: {{ $incident->latitude }}, {{ $incident->longitude }}
                <br>{{ $incident->description }}
            </li>
        @endforeach
    </ul>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-6.9175, 107.6191], 13); // Koordinat default: Bandung

        // Tambahkan tile layer OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Data kejadian dari Laravel
        var incidents = @json($incidents);

        // Fungsi untuk menampilkan marker (titik kejadian)
        function showMarkers() {
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker || layer instanceof L.LayerGroup) {
                    map.removeLayer(layer);
                }
            });

            incidents.forEach(function (incident) {
                var marker = L.marker([incident.latitude, incident.longitude]).addTo(map);
                marker.bindPopup(`<b>${incident.location_name}</b><br>${incident.description}`);
            });
        }

        // Fungsi untuk menampilkan Choropleth Map
        function showChoropleth() {
            map.eachLayer(function (layer) {
                if (!(layer instanceof L.TileLayer)) {
                    map.removeLayer(layer);
                }
            });

            // Mock data wilayah dengan jumlah kejadian (geoJSON sederhana)
            var regions = {
                "type": "FeatureCollection",
                "features": [
                    {
                        "type": "Feature",
                        "properties": {
                            "region_name": "Bandung",
                            "incident_count": incidents.filter(i => i.region_name === "Bandung").length
                        },
                        "geometry": {
                            "type": "Polygon",
                            "coordinates": [[[107.574, -6.95], [107.65, -6.95], [107.65, -6.87], [107.574, -6.87], [107.574, -6.95]]]
                        }
                    },
                    {
                        "type": "Feature",
                        "properties": {
                            "region_name": "Cimahi",
                            "incident_count": incidents.filter(i => i.region_name === "Cimahi").length
                        },
                        "geometry": {
                            "type": "Polygon",
                            "coordinates": [[[107.52, -6.94], [107.56, -6.94], [107.56, -6.88], [107.52, -6.88], [107.52, -6.94]]]
                        }
                    },
                    {
                        "type": "Feature",
                        "properties": {
                            "region_name": "Soreang",
                            "incident_count": incidents.filter(i => i.region_name === "Soreang").length
                        },
                        "geometry": {
                            "type": "Polygon",
                            "coordinates": [[[107.48, -6.97], [107.52, -6.97], [107.52, -6.91], [107.48, -6.91], [107.48, -6.97]]]
                        }
                    }
                ]
            };

            // Choropleth layer
            L.geoJSON(regions, {
                style: function (feature) {
                    return {
                        fillColor: getColor(feature.properties.incident_count),
                        weight: 2,
                        opacity: 1,
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.7
                    };
                },
                onEachFeature: function (feature, layer) {
                    layer.bindPopup(`<b>${feature.properties.region_name}</b><br>Jumlah Kejadian: ${feature.properties.incident_count}`);
                }
            }).addTo(map);
        }

        // Fungsi untuk menentukan warna berdasarkan jumlah kejadian
        function getColor(count) {
            return count > 5 ? '#800026' :
                   count > 3 ? '#BD0026' :
                   count > 1 ? '#E31A1C' :
                               '#FFEDA0';
        }

        // Default tampilan marker
        showMarkers();
    </script>
</body>
</html>
