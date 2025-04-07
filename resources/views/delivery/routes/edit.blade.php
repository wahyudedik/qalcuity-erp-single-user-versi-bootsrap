@extends('layouts.app')

@section('title', 'Edit Rute Pengiriman')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Rute Pengiriman
                    </h2>
                    <div class="text-muted mt-1">Perbarui informasi rute pengiriman</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.routes.detail', $id) }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @php
            $dummyRoutes = [
                [
                    'id' => 1,
                    'code' => 'RT-001',
                    'name' => 'Jakarta Utara - Sunter',
                    'origin' => 'Batching Plant Jakarta Utara',
                    'destination' => 'Proyek Apartemen Sunter',
                    'distance' => 12.5,
                    'estimated_time' => '45',
                    'status' => 'Aktif',
                    'type' => 'Reguler',
                    'description' => 'Rute reguler untuk pengiriman ke area Sunter dan sekitarnya',
                    'notes' => 'Hindari jam sibuk pagi (7-9) dan sore (16-19)',
                    'created_at' => '2023-05-15',
                    'updated_at' => '2023-08-20',
                    'toll_gates' => ['Tol Pelabuhan', 'Tol Cawang'],
                    'traffic_conditions' => 'Sedang',
                    'alternative_routes' => 'Via Ancol jika terjadi kemacetan di rute utama',
                    'restrictions' => 'Tidak ada pembatasan jam operasional',
                    'waypoints' => [
                        ['name' => 'Pintu Tol Pelabuhan', 'lat' => -6.1234, 'lng' => 106.8765],
                        ['name' => 'Persimpangan Sunter', 'lat' => -6.1345, 'lng' => 106.8654],
                        ['name' => 'Pintu Masuk Proyek', 'lat' => -6.1456, 'lng' => 106.8543],
                    ],
                ],
                [
                    'id' => 2,
                    'code' => 'RT-002',
                    'name' => 'Jakarta Selatan - Kuningan',
                    'origin' => 'Batching Plant Jakarta Selatan',
                    'destination' => 'Proyek Office Tower Kuningan',
                    'distance' => 8.7,
                    'estimated_time' => '35',
                    'status' => 'Aktif',
                    'type' => 'Proyek',
                    'description' => 'Rute khusus untuk proyek pembangunan Office Tower di Kuningan',
                    'notes' => 'Perhatikan pembatasan kendaraan berat di area Kuningan',
                    'created_at' => '2023-06-10',
                    'updated_at' => '2023-07-15',
                    'toll_gates' => ['Tol Dalam Kota', 'Exit Kuningan'],
                    'traffic_conditions' => 'Padat',
                    'alternative_routes' => 'Via Casablanca jika terjadi kemacetan di Kuningan',
                    'restrictions' => 'Pembatasan kendaraan berat 10-14 (weekdays)',
                    'waypoints' => [
                        ['name' => 'Pintu Tol Dalam Kota', 'lat' => -6.2345, 'lng' => 106.8234],
                        ['name' => 'Exit Kuningan', 'lat' => -6.2456, 'lng' => 106.8345],
                        ['name' => 'Persimpangan Kuningan', 'lat' => -6.2567, 'lng' => 106.8456],
                        ['name' => 'Lokasi Proyek', 'lat' => -6.2678, 'lng' => 106.8567],
                    ],
                ],
                [
                    'id' => 3,
                    'code' => 'RT-003',
                    'name' => 'Jakarta Barat - Cengkareng',
                    'origin' => 'Batching Plant Jakarta Barat',
                    'destination' => 'Perumahan Cengkareng',
                    'distance' => 15.2,
                    'estimated_time' => '55',
                    'status' => 'Tidak Aktif',
                    'type' => 'Reguler',
                    'description' => 'Rute reguler untuk pengiriman ke area Cengkareng',
                    'notes' => 'Rute sementara tidak aktif karena perbaikan jalan',
                    'created_at' => '2023-04-20',
                    'updated_at' => '2023-09-05',
                    'toll_gates' => ['Tol Jakarta-Tangerang', 'Exit Cengkareng'],
                    'traffic_conditions' => 'Lancar',
                    'alternative_routes' => 'Via Kapuk jika terjadi kemacetan di rute utama',
                    'restrictions' => 'Tidak ada pembatasan jam operasional',
                    'waypoints' => [
                        ['name' => 'Pintu Tol Jakarta-Tangerang', 'lat' => -6.1567, 'lng' => 106.7345],
                        ['name' => 'Exit Cengkareng', 'lat' => -6.1678, 'lng' => 106.7234],
                        ['name' => 'Perumahan Cengkareng', 'lat' => -6.1789, 'lng' => 106.7123],
                    ],
                ],
                [
                    'id' => 4,
                    'code' => 'RT-004',
                    'name' => 'Jakarta Timur - Cakung',
                    'origin' => 'Batching Plant Jakarta Timur',
                    'destination' => 'Kawasan Industri Cakung',
                    'distance' => 10.3,
                    'estimated_time' => '40',
                    'status' => 'Aktif',
                    'type' => 'Khusus',
                    'description' => 'Rute khusus untuk pengiriman ke Kawasan Industri Cakung',
                    'notes' => 'Koordinasi dengan security kawasan industri untuk akses',
                    'created_at' => '2023-07-05',
                    'updated_at' => '2023-08-15',
                    'toll_gates' => ['Tol Jakarta-Cikampek', 'Exit Cakung'],
                    'traffic_conditions' => 'Sedang',
                    'alternative_routes' => 'Via Pulo Gadung jika terjadi kemacetan di rute utama',
                    'restrictions' => 'Jam operasional kawasan industri 08.00-17.00',
                    'waypoints' => [
                        ['name' => 'Pintu Tol Jakarta-Cikampek', 'lat' => -6.2123, 'lng' => 106.9456],
                        ['name' => 'Exit Cakung', 'lat' => -6.2234, 'lng' => 106.9567],
                        ['name' => 'Gerbang Kawasan Industri', 'lat' => -6.2345, 'lng' => 106.9678],
                    ],
                ],
                [
                    'id' => 5,
                    'code' => 'RT-005',
                    'name' => 'Jakarta Pusat - Kemayoran',
                    'origin' => 'Batching Plant Jakarta Pusat',
                    'destination' => 'Proyek Stadion Kemayoran',
                    'distance' => 7.8,
                    'estimated_time' => '30',
                    'status' => 'Aktif',
                    'type' => 'Proyek',
                    'description' => 'Rute khusus untuk proyek pembangunan Stadion Kemayoran',
                    'notes' => 'Koordinasi dengan pengawas proyek untuk jadwal pengecoran',
                    'created_at' => '2023-08-01',
                    'updated_at' => '2023-09-10',
                    'toll_gates' => [],
                    'traffic_conditions' => 'Padat',
                    'alternative_routes' => 'Via Gunung Sahari jika terjadi kemacetan di Kemayoran',
                    'restrictions' => 'Pengiriman hanya diizinkan pukul 22.00-05.00',
                    'waypoints' => [
                        ['name' => 'Persimpangan Senen', 'lat' => -6.1789, 'lng' => 106.8456],
                        ['name' => 'Kemayoran', 'lat' => -6.1678, 'lng' => 106.8567],
                        ['name' => 'Lokasi Proyek Stadion', 'lat' => -6.1567, 'lng' => 106.8678],
                    ],
                ],
            ];

            $route = null;
            foreach ($dummyRoutes as $r) {
                if ($r['id'] == $id) {
                    $route = $r;
                    break;
                }
            }
        @endphp

        @if ($route)
            <div class="row mt-3">
                <div class="col-md-8">
                    <form action="#" method="post" class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Rute</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Kode Rute</label>
                                    <input type="text" class="form-control" name="code" value="{{ $route['code'] }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Nama Rute</label>
                                    <input type="text" class="form-control" name="name" value="{{ $route['name'] }}"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Asal</label>
                                    <input type="text" class="form-control" name="origin" value="{{ $route['origin'] }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Tujuan</label>
                                    <input type="text" class="form-control" name="destination"
                                        value="{{ $route['destination'] }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label required">Jarak (km)</label>
                                    <input type="number" step="0.1" class="form-control" name="distance"
                                        value="{{ $route['distance'] }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Estimasi Waktu (menit)</label>
                                    <input type="number" class="form-control" name="estimated_time"
                                        value="{{ $route['estimated_time'] }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label required">Kondisi Lalu Lintas</label>
                                    <select class="form-select" name="traffic_conditions" required>
                                        <option value="Lancar"
                                            {{ $route['traffic_conditions'] == 'Lancar' ? 'selected' : '' }}>Lancar</option>
                                        <option value="Sedang"
                                            {{ $route['traffic_conditions'] == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                        <option value="Padat"
                                            {{ $route['traffic_conditions'] == 'Padat' ? 'selected' : '' }}>Padat</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Jenis Rute</label>
                                    <select class="form-select" name="type" required>
                                        <option value="Reguler" {{ $route['type'] == 'Reguler' ? 'selected' : '' }}>Reguler
                                        </option>
                                        <option value="Proyek" {{ $route['type'] == 'Proyek' ? 'selected' : '' }}>Proyek
                                        </option>
                                        <option value="Khusus" {{ $route['type'] == 'Khusus' ? 'selected' : '' }}>Khusus
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Status</label>
                                    <select class="form-select" name="status" required>
                                        <option value="Aktif" {{ $route['status'] == 'Aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="Tidak Aktif"
                                            {{ $route['status'] == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description" rows="3">{{ $route['description'] }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea class="form-control" name="notes" rows="2">{{ $route['notes'] }}</textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Rute Alternatif</label>
                                    <input type="text" class="form-control" name="alternative_routes"
                                        value="{{ $route['alternative_routes'] }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Pembatasan</label>
                                    <input type="text" class="form-control" name="restrictions"
                                        value="{{ $route['restrictions'] }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gerbang Tol</label>
                                <select class="form-select" name="toll_gates[]" multiple>
                                    @php
                                        $tollGates = [
                                            'Tol Pelabuhan',
                                            'Tol Cawang',
                                            'Tol Dalam Kota',
                                            'Exit Kuningan',
                                            'Tol Jakarta-Tangerang',
                                            'Exit Cengkareng',
                                            'Tol Jakarta-Cikampek',
                                            'Exit Cakung',
                                        ];
                                    @endphp
                                    @foreach ($tollGates as $gate)
                                        <option value="{{ $gate }}"
                                            {{ in_array($gate, $route['toll_gates']) ? 'selected' : '' }}>
                                            {{ $gate }}</option>
                                    @endforeach
                                </select>
                                <small class="form-hint">Tekan Ctrl (atau Cmd di Mac) untuk memilih beberapa gerbang
                                    tol</small>
                            </div>
                        </div>
                    </form>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Titik Rute (Waypoints)</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-3">
                                Edit titik-titik rute dengan mengklik pada peta atau perbarui secara manual.
                                Titik pertama akan menjadi titik awal dan titik terakhir akan menjadi titik akhir rute.
                            </p>

                            <div id="waypoints-container">
                                @foreach ($route['waypoints'] as $index => $waypoint)
                                    <div class="waypoint-item mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="waypoint_names[]"
                                                value="{{ $waypoint['name'] }}" placeholder="Nama lokasi">
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="removeWaypoint(this)">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col">
                                                <input type="text" class="form-control" name="waypoint_lats[]"
                                                    value="{{ $waypoint['lat'] }}" placeholder="Latitude">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" name="waypoint_lngs[]"
                                                    value="{{ $waypoint['lng'] }}" placeholder="Longitude">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <button type="button" class="btn btn-outline-primary" onclick="addWaypoint()">
                                    <i class="ti ti-plus"></i> Tambah Titik Rute
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-end">
                        <a href="{{ route('delivery.routes.detail', $id) }}"
                            class="btn btn-outline-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Peta Rute</h3>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 500px; border-radius: 4px;"></div>
                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="ti ti-info-circle"></i> Klik pada peta untuk menambahkan titik rute. Drag
                                    marker untuk menyesuaikan posisi.
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Perubahan</h3>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-event">
                                    <div class="timeline-event-icon bg-green">
                                        <i class="ti ti-pencil"></i>
                                    </div>
                                    <div class="card timeline-event-card">
                                        <div class="card-body">
                                            <div class="text-muted float-end">{{ $route['updated_at'] }}</div>
                                            <h4>Perubahan Terakhir</h4>
                                            <p class="text-muted">
                                                Perubahan pada status rute dan catatan pembatasan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-event">
                                    <div class="timeline-event-icon bg-blue">
                                        <i class="ti ti-pencil"></i>
                                    </div>
                                    <div class="card timeline-event-card">
                                        <div class="card-body">
                                            <div class="text-muted float-end">2023-07-10</div>
                                            <h4>Pembaruan Waypoints</h4>
                                            <p class="text-muted">
                                                Penambahan titik rute baru untuk menghindari area konstruksi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-event">
                                    <div class="timeline-event-icon bg-azure">
                                        <i class="ti ti-plus"></i>
                                    </div>
                                    <div class="card timeline-event-card">
                                        <div class="card-body">
                                            <div class="text-muted float-end">{{ $route['created_at'] }}</div>
                                            <h4>Rute Dibuat</h4>
                                            <p class="text-muted">
                                                Rute pertama kali dibuat dalam sistem.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card mt-3">
                <div class="card-body">
                    <div class="empty">
                        <div class="empty-img">
                            <i class="ti ti-map-off" style="font-size: 3rem;"></i>
                        </div>
                        <p class="empty-title">Rute tidak ditemukan</p>
                        <p class="empty-subtitle text-muted">
                            Rute pengiriman dengan ID {{ $id }} tidak ditemukan dalam sistem.
                        </p>
                        <div class="empty-action">
                            <a href="{{ route('delivery.routes') }}" class="btn btn-primary">
                                <i class="ti ti-arrow-left"></i>
                                Kembali ke Daftar Rute
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    @if ($route)
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" defer></script>
        <script>
            let map;
            let markers = [];
            let routePath;
            const initialWaypoints = @json($route['waypoints']);

            function initMap() {
                // Initialize map centered on the first waypoint
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 12,
                    center: {
                        lat: initialWaypoints[0].lat,
                        lng: initialWaypoints[0].lng
                    },
                });

                // Add click listener to add waypoints
                map.addListener("click", (event) => {
                    addMarker(event.latLng);
                });

                // Initialize route path
                routePath = new google.maps.Polyline({
                    path: [],
                    geodesic: true,
                    strokeColor: "#0061f2",
                    strokeOpacity: 1.0,
                    strokeWeight: 3,
                });

                routePath.setMap(map);

                // Add initial markers
                initialWaypoints.forEach(waypoint => {
                    const position = new google.maps.LatLng(waypoint.lat, waypoint.lng);
                    addMarker(position, waypoint.name);
                });
            }

            function addMarker(location, name = '') {
                const marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true,
                    label: (markers.length + 1).toString()
                });

                markers.push(marker);

                // Update the route path
                updateRoutePath();

                // Add listener for marker drag end
                marker.addListener("dragend", () => {
                    updateWaypointCoordinates();
                    updateRoutePath();
                });
            }

            function updateWaypointCoordinates() {
                const latInputs = document.getElementsByName("waypoint_lats[]");
                const lngInputs = document.getElementsByName("waypoint_lngs[]");

                for (let i = 0; i < markers.length; i++) {
                    if (i < latInputs.length && i < lngInputs.length) {
                        latInputs[i].value = markers[i].getPosition().lat();
                        lngInputs[i].value = markers[i].getPosition().lng();
                    }
                }
            }

            function updateRoutePath() {
                const path = markers.map(marker => marker.getPosition());
                routePath.setPath(path);
            }

            function addWaypoint() {
                const waypointContainer = document.getElementById("waypoints-container");
                const newWaypoint = document.createElement("div");
                newWaypoint.className = "waypoint-item mb-2";
                newWaypoint.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="waypoint_names[]" placeholder="Nama lokasi">
                <button type="button" class="btn btn-outline-secondary" onclick="removeWaypoint(this)">
                    <i class="ti ti-trash"></i>
                </button>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <input type="text" class="form-control" name="waypoint_lats[]" placeholder="Latitude">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="waypoint_lngs[]" placeholder="Longitude">
                </div>
            </div>
        `;
                waypointContainer.appendChild(newWaypoint);
            }

            function removeWaypoint(button) {
                const waypointItem = button.closest('.waypoint-item');
                const waypointContainer = document.getElementById("waypoints-container");
                const index = Array.from(waypointContainer.children).indexOf(waypointItem);

                // Remove the marker if it exists
                if (index < markers.length) {
                    markers[index].setMap(null);
                    markers.splice(index, 1);

                    // Update marker labels
                    markers.forEach((marker, i) => {
                        marker.setLabel((i + 1).toString());
                    });

                    // Update the route path
                    updateRoutePath();
                }

                // Remove the waypoint input
                waypointContainer.removeChild(waypointItem);
            }
        </script>
    @endif
@endsection
