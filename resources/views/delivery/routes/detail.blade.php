@extends('layouts.app')

@section('title', 'Detail Rute Pengiriman')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Detail Rute Pengiriman
                    </h2>
                    <div class="text-muted mt-1">Informasi lengkap rute pengiriman</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.routes') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Kembali
                        </a>
                        <a href="{{ route('delivery.routes.edit', $id) }}" class="btn btn-primary">
                            <i class="ti ti-edit"></i>
                            Edit Rute
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
                    'estimated_time' => '45 menit',
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
                    'estimated_time' => '35 menit',
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
                    'estimated_time' => '55 menit',
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
                    'estimated_time' => '40 menit',
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
                    'estimated_time' => '30 menit',
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Rute</h3>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kode Rute</div>
                                    <div class="datagrid-content">{{ $route['code'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Nama Rute</div>
                                    <div class="datagrid-content">{{ $route['name'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Status</div>
                                    <div class="datagrid-content">
                                        @if ($route['status'] == 'Aktif')
                                            <span class="badge bg-success">{{ $route['status'] }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $route['status'] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Jenis Rute</div>
                                    <div class="datagrid-content">
                                        @if ($route['type'] == 'Reguler')
                                            <span class="badge bg-blue">{{ $route['type'] }}</span>
                                        @elseif($route['type'] == 'Proyek')
                                            <span class="badge bg-purple">{{ $route['type'] }}</span>
                                        @else
                                            <span class="badge bg-orange">{{ $route['type'] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Asal</div>
                                    <div class="datagrid-content">{{ $route['origin'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tujuan</div>
                                    <div class="datagrid-content">{{ $route['destination'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Jarak</div>
                                    <div class="datagrid-content">{{ $route['distance'] }} km</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Estimasi Waktu</div>
                                    <div class="datagrid-content">{{ $route['estimated_time'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kondisi Lalu Lintas</div>
                                    <div class="datagrid-content">
                                        @if ($route['traffic_conditions'] == 'Lancar')
                                            <span class="badge bg-green">{{ $route['traffic_conditions'] }}</span>
                                        @elseif($route['traffic_conditions'] == 'Sedang')
                                            <span class="badge bg-yellow">{{ $route['traffic_conditions'] }}</span>
                                        @else
                                            <span class="badge bg-red">{{ $route['traffic_conditions'] }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tanggal Dibuat</div>
                                    <div class="datagrid-content">{{ $route['created_at'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Terakhir Diperbarui</div>
                                    <div class="datagrid-content">{{ $route['updated_at'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Deskripsi & Catatan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h4 class="mb-2">Deskripsi</h4>
                                <p>{{ $route['description'] }}</p>
                            </div>
                            <div class="mb-3">
                                <h4 class="mb-2">Catatan</h4>
                                <p>{{ $route['notes'] }}</p>
                            </div>
                            <div class="mb-3">
                                <h4 class="mb-2">Rute Alternatif</h4>
                                <p>{{ $route['alternative_routes'] }}</p>
                            </div>
                            <div class="mb-3">
                                <h4 class="mb-2">Pembatasan</h4>
                                <p>{{ $route['restrictions'] }}</p>
                            </div>
                            <div class="mb-3">
                                <h4 class="mb-2">Gerbang Tol</h4>
                                @if (count($route['toll_gates']) > 0)
                                    <div class="tags">
                                        @foreach ($route['toll_gates'] as $tollGate)
                                            <span class="badge bg-azure-lt">{{ $tollGate }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">Tidak ada gerbang tol pada rute ini</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Penggunaan</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nomor DO</th>
                                            <th>Armada</th>
                                            <th>Driver</th>
                                            <th>Durasi Aktual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $usageHistory = [
                                                [
                                                    'date' => '2023-09-15',
                                                    'do_number' => 'DO-2023091501',
                                                    'fleet' => 'Truck Mixer #TM-001',
                                                    'driver' => 'Budi Santoso',
                                                    'actual_duration' => '50 menit',
                                                ],
                                                [
                                                    'date' => '2023-09-12',
                                                    'do_number' => 'DO-2023091203',
                                                    'fleet' => 'Truck Mixer #TM-003',
                                                    'driver' => 'Ahmad Hidayat',
                                                    'actual_duration' => '42 menit',
                                                ],
                                                [
                                                    'date' => '2023-09-10',
                                                    'do_number' => 'DO-2023091005',
                                                    'fleet' => 'Truck Mixer #TM-002',
                                                    'driver' => 'Dedi Kurniawan',
                                                    'actual_duration' => '47 menit',
                                                ],
                                                [
                                                    'date' => '2023-09-08',
                                                    'do_number' => 'DO-2023090802',
                                                    'fleet' => 'Truck Mixer #TM-001',
                                                    'driver' => 'Budi Santoso',
                                                    'actual_duration' => '51 menit',
                                                ],
                                                [
                                                    'date' => '2023-09-05',
                                                    'do_number' => 'DO-2023090504',
                                                    'fleet' => 'Truck Mixer #TM-004',
                                                    'driver' => 'Rudi Hartono',
                                                    'actual_duration' => '45 menit',
                                                ],
                                            ];
                                        @endphp

                                        @foreach ($usageHistory as $history)
                                            <tr>
                                                <td>{{ $history['date'] }}</td>
                                                <td>
                                                    <a href="#" class="text-reset">{{ $history['do_number'] }}</a>
                                                </td>
                                                <td>{{ $history['fleet'] }}</td>
                                                <td>{{ $history['driver'] }}</td>
                                                <td>{{ $history['actual_duration'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    Lihat Semua Riwayat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Peta Rute</h3>
                        </div>
                        <div class="card-body">
                            <div id="map" style="height: 400px; border-radius: 4px;"></div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Titik Rute (Waypoints)</h3>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                @foreach ($route['waypoints'] as $index => $waypoint)
                                    <div class="timeline-event">
                                        @if ($index === 0)
                                            <div class="timeline-event-icon bg-green">
                                                <i class="ti ti-flag"></i>
                                            </div>
                                        @elseif($index === count($route['waypoints']) - 1)
                                            <div class="timeline-event-icon bg-red">
                                                <i class="ti ti-flag-filled"></i>
                                            </div>
                                        @else
                                            <div class="timeline-event-icon bg-blue">
                                                <i class="ti ti-map-pin"></i>
                                            </div>
                                        @endif
                                        <div class="card timeline-event-card">
                                            <div class="card-body">
                                                <div class="text-muted float-end">Point {{ $index + 1 }}</div>
                                                <h4>{{ $waypoint['name'] }}</h4>
                                                <p class="text-muted">
                                                    Lat: {{ $waypoint['lat'] }}, Lng: {{ $waypoint['lng'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Analisis Rute</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-auto">
                                        <span class="text-muted d-block">Efisiensi Rute</span>
                                        <div class="font-weight-medium">85%</div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-efficiency"></div>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 85%" role="progressbar"
                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="85% Complete">
                                        <span class="visually-hidden">85% Complete</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-auto">
                                        <span class="text-muted d-block">Ketepatan Waktu</span>
                                        <div class="font-weight-medium">92%</div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-punctuality"></div>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" style="width: 92%" role="progressbar"
                                        aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="92% Complete">
                                        <span class="visually-hidden">92% Complete</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-auto">
                                        <span class="text-muted d-block">Konsumsi Bahan Bakar</span>
                                        <div class="font-weight-medium">78%</div>
                                    </div>
                                    <div class="ms-3">
                                        <div class="chart-sparkline chart-sparkline-sm" id="sparkline-fuel"></div>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-yellow" style="width: 78%" role="progressbar"
                                        aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="78% Complete">
                                        <span class="visually-hidden">78% Complete</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h4 class="mb-3">Statistik Pengiriman</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Total Pengiriman</div>
                                                </div>
                                                <div class="h1 mb-0">127</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Rata-rata Durasi</div>
                                                </div>
                                                <div class="h1 mb-0">47m</div>
                                            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" defer></script>
        <script>
            // Initialize map
            function initMap() {
                const waypoints = @json($route['waypoints']);

                // Create map centered on the first waypoint
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 12,
                    center: {
                        lat: waypoints[0].lat,
                        lng: waypoints[0].lng
                    },
                });

                // Create markers for each waypoint
                waypoints.forEach((waypoint, index) => {
                    let icon = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";

                    // Use different icons for start and end points
                    if (index === 0) {
                        icon = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
                    } else if (index === waypoints.length - 1) {
                        icon = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
                    }

                    const marker = new google.maps.Marker({
                        position: {
                            lat: waypoint.lat,
                            lng: waypoint.lng
                        },
                        map: map,
                        title: waypoint.name,
                        icon: {
                            url: icon
                        }
                    });

                    // Add info window to each marker
                    const infoWindow = new google.maps.InfoWindow({
                        content: `<div><strong>${waypoint.name}</strong></div>`
                    });

                    marker.addListener("click", () => {
                        infoWindow.open(map, marker);
                    });
                });

                // Create a path between the waypoints
                const routePath = new google.maps.Polyline({
                    path: waypoints.map(wp => ({
                        lat: wp.lat,
                        lng: wp.lng
                    })),
                    geodesic: true,
                    strokeColor: "#0061f2",
                    strokeOpacity: 1.0,
                    strokeWeight: 3,
                });

                routePath.setMap(map);
            }

            // Initialize sparkline charts
            document.addEventListener("DOMContentLoaded", function() {
                // Efficiency sparkline
                new ApexCharts(document.getElementById('sparkline-efficiency'), {
                    chart: {
                        type: 'line',
                        sparkline: {
                            enabled: true
                        },
                        height: 30,
                    },
                    stroke: {
                        width: 2
                    },
                    series: [{
                        data: [80, 82, 79, 85, 83, 85]
                    }],
                    colors: ['#0061f2']
                }).render();

                // Punctuality sparkline
                new ApexCharts(document.getElementById('sparkline-punctuality'), {
                    chart: {
                        type: 'line',
                        sparkline: {
                            enabled: true
                        },
                        height: 30,
                    },
                    stroke: {
                        width: 2
                    },
                    series: [{
                        data: [90, 88, 92, 94, 91, 92]
                    }],
                    colors: ['#20c997']
                }).render();

                // Fuel consumption sparkline
                new ApexCharts(document.getElementById('sparkline-fuel'), {
                    chart: {
                        type: 'line',
                        sparkline: {
                            enabled: true
                        },
                        height: 30,
                    },
                    stroke: {
                        width: 2
                    },
                    series: [{
                        data: [75, 80, 76, 79, 78, 78]
                    }],
                    colors: ['#fab005']
                }).render();
            });
        </script>
    @endif
@endsection
